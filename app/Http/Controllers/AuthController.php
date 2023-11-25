<?php

namespace App\Http\Controllers;

use App\Models\ExamAttempt;
use App\Models\ExamPayments;
use App\Models\Package;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use App\Models\PasswordReset;
// use Mail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    //
    public function loadRegister()
    {
        if(Auth::user() && Auth::user()->is_admin == 1)
        {
            return redirect('/admin/dashboard');
        }
        else if(Auth::user() && Auth::user()->is_admin == 0)
        {
            return redirect('/dashboard');
        }
        return view('register');
    }

    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|confirmed|min:4'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Registeration Confirmed!');

    }

    public function loadLogin()
    {
        if(Auth::user() && Auth::user()->is_admin == 1)
        {
            return redirect('/admin/dashboard');
        }
        else if(Auth::user() && Auth::user()->is_admin == 0)
        {
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function userLogin (Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);
        
        $userCredential = $request->only('email', 'password');
        
        if(Auth::attempt ($userCredential)) {
            if(Auth::user()->is_admin == 1){
                return redirect('/admin/dashboard');
            }
            else {
                return redirect('/dashboard');
            }
        }
        else{
            return back()->with('error', 'Username & Password is incorrect');
        }
    }

    public function studentExams()
    {
        $exams = Exam::where('plan',0)->with('subjects')->orderBy('date','DESC')->get();
        //where('plan',0)->
        return view('student.studentExams',['exams'=>$exams]);
    }

    public function adminProfile()
    {
        $userData = Auth::user();
        return view('admin.profile', compact('userData'));
    }
	public function editProfile(Request $request)
	{
		try {
			$user = Auth::user();

			// Get the existing user data
			$userData = User::find($user->id);

			if ($request->hasFile('profile_pic')) {
				// Handle profile picture update
				$uploadedFile = $request->file('profile_pic');
				$originalFileName = $uploadedFile->getClientOriginalName();

				// Check if an image with the same name already exists
				if (Storage::exists("public/{$originalFileName}")) {
					return response()->json(['success' => false, 'msg' => 'Image with the same name already exists.']);
				}

				// Check if the filename is used by another user
				$filenameInUse = User::where('profile_pic', $originalFileName)
					->where('id', '!=', $user->id)
					->exists();

				if ($filenameInUse) {
					return response()->json(['success' => false, 'msg' => 'Filename is already used by another user. Please upload another image.']);
				}

				// Store the new image in the storage/app/public directory with the desired file name
				$path = $uploadedFile->storeAs('public', $originalFileName);

				Log::info('Stored File Name:', ['storedFileName' => $originalFileName]);

				// Update the user's profile_pic field in the database
				$userData->profile_pic = $originalFileName;
			}

			// Handle name update
			$newName = $request->input('name');
			if ($newName && $newName !== $userData->name) {
				$userData->name = $newName;
			}

			// Handle email update
			$newEmail = $request->input('email');
			if ($newEmail && $newEmail !== $userData->email) {
				// Check for email format and uniqueness
				if (filter_var($newEmail, FILTER_VALIDATE_EMAIL) && User::where('email', $newEmail)->doesntExist()) {
					$userData->email = $newEmail;
				} else {
					return response()->json(['success' => false, 'msg' => 'Invalid or duplicate email address.']);
				}
			}

			// Save the updated user data
			$userData->save();

			// Get all images associated with any user in the database
			$existingImagesInDatabase = User::pluck('profile_pic')->all();

			// Get all images in the storage directory
			$allImages = array_map('basename', Storage::files('public'));

			// Identify images to be deleted (all except the latest associated image)
			$imagesToDelete = array_diff($allImages, [$userData->profile_pic], $existingImagesInDatabase);

			foreach ($imagesToDelete as $imageToDelete) {
				Storage::delete('public/' . $imageToDelete);
			}

			// After updating and deleting, log the list of files in the storage directory
			Log::info('Files after update:', ['files' => Storage::files('public')]);

			return response()->json(['success' => true, 'msg' => 'Profile Updated Successfully!']);
		} catch (\Exception $e) {
			return response()->json(['success' => false, 'msg' => $e->getMessage()]);
		}
	}






    public function adminDashboard()
    {
        // Get the counts
        $subjectCount = Subject::count();
        $examCount = Exam::count();
        $packageCount = Package::count();
        $questionCount = Question::count();
        $examReviewedCount = ExamAttempt::where('status', 1)->count();
        $studentCount = User::where('is_admin', 0)->count();
        $paymentCount = ExamPayments::count();

        //Chart-1 Data
        $subjects = Subject::pluck('sub_code')->toArray(); // Get an array of subject IDs
        $subjectsWithExamCount = Subject::select('subjects.id as subject_id', DB::raw('count(exams.id) as exam_count'))
            ->leftJoin('exams', 'subjects.id', '=', 'exams.subject_id')
            ->groupBy('subjects.id')
            ->get();

        //Chart-2 Data
        $rankedStudents = DB::table('exams_attempt')
            ->select('users.name as student_name', 'exams.exam_name as exam_name', DB::raw('MAX(exams_attempt.marks) as best_score'))
            ->join('users', 'users.id', '=', 'exams_attempt.user_id')
            ->join('exams', 'exams.id', '=', 'exams_attempt.exam_id')
            ->groupBy('student_name', 'exam_name')
            ->get();
        $chartData = [];
        foreach ($rankedStudents as $student) {
            $studentName = $student->student_name;
            $examName = $student->exam_name;
            
            if (!isset($chartData[$studentName])) {
                $chartData[$studentName] = [];
            }
            
            $chartData[$studentName][$examName] = $student->best_score;
        }

        //Chart-3 Data
        $reviewedCount = DB::table('exams_attempt')->where('status', 1)->count();
        $notReviewedCount = DB::table('exams_attempt')->where('status', 0)->count();

        //Chart-4 Data
        $paidExamsCount = DB::table('exams')->where('plan', 1)->count();
        $freeExamsCount = DB::table('exams')->where('plan', 0)->count();

        //Chart-5 Data
        $allStudents = DB::table('users')->where('is_admin', 0)->select('name as student_name')->get();
        $allExams = DB::table('exams')->select('exam_name')->get();

        $attemptData = DB::table('users')
            ->where('users.is_admin', 0)
            ->crossJoin('exams')
            ->leftJoin('exams_attempt', function ($join) {
                $join->on('exams_attempt.user_id', '=', 'users.id')
                    ->on('exams_attempt.exam_id', '=', 'exams.id');
            })
            ->select('users.name as student_name', 'exams.exam_name as exam_name', DB::raw('count(exams_attempt.id) as attempt_count'))
            ->groupBy('users.name', 'exams.exam_name')
            ->get();

        // Pass the data to your Blade view
        return view('admin.dashboard', compact('subjectCount', 'examCount', 'packageCount', 'questionCount', 'examReviewedCount', 'studentCount', 'paymentCount', 'subjects', 'subjectsWithExamCount', 'chartData', 'reviewedCount', 'notReviewedCount', 'paidExamsCount', 'freeExamsCount', 'allStudents', 'allExams', 'attemptData'));
    }
	
	
	public function studDashboard()
	{
		try {
			$userId = auth()->user()->id;

			// Counts
			$freeExam = Exam::where('plan', 0)->count();
			$paidExam = Exam::where('plan', 1)->count();
			$package = Package::count();
			$attemptedExamsCount = ExamAttempt::where('user_id', $userId)
				->selectRaw('COUNT(DISTINCT exam_id) as total_attempts')
				->value('total_attempts');
			$topScore = ExamAttempt::where('user_id', $userId)->max('marks');
			
			
			// Charts
			$examNames = Exam::pluck('exam_name')->toArray();

			$examMarks = [];
			$attemptCounts = [];

			foreach ($examNames as $examName) {
				$highestMarks = ExamAttempt::where('user_id', $userId)
					->whereHas('exam', function ($query) use ($examName) {
						$query->where('exam_name', $examName);
					})
					->max('marks');

				$examMarks[] = $highestMarks ?: 0;

				$attemptCount = ExamAttempt::where('user_id', $userId)
					->whereHas('exam', function ($query) use ($examName) {
						$query->where('exam_name', $examName);
					})
					->count();

				$attemptCounts[] = $attemptCount;
			}
			
			//Log::info('Exam Marks:', ['examMarks' => $examMarks]);
			//Log::info('Exam Attempts:', ['attemptCounts' => $attemptCounts]);
			
			//Transactions
			$payments = ExamPayments::where('user_id', $userId)
				->latest('created_at') // Order by the latest created_at
				->limit(5)             // Limit the result to the latest 5
				->get();

			$paymentData = [];

			foreach ($payments as $payment) {
				// Your existing logic here...
				$paidExamName = Exam::where('id', $payment->exam_id)->value('exam_name');
				$transactionData = json_decode($payment->payment_details, true);
				
				// Check if the dictionary has 'razorpay_order_id' or 'PayerID'
				$transactionId = '';
				if (isset($transactionData['razorpay_order_id'])) {
					$transactionId = $transactionData['razorpay_order_id'];
				} elseif (isset($transactionData['PayerID'])) {
					$transactionId = $transactionData['PayerID'];
				}

				$createdAtUTC = Carbon::parse($payment->created_at)->setTimezone('UTC');
				$createdAtIST = $createdAtUTC->setTimezone('Asia/Kolkata');
				
				Carbon::setLocale('en');
				Carbon::setToStringFormat('d-m-Y H:i:s');
				
				$timeAgo = $createdAtIST->diffForHumans();

				$paymentData[] = [
					'exam_name' => $paidExamName,
					'transaction_id' => $transactionId,
					'time_ago' => $timeAgo,
				];
			}
			

			return view('student.dashboard', compact('freeExam', 'paidExam', 'package', 'attemptedExamsCount', 'topScore', 'examNames', 'examMarks', 'paymentData', 'attemptCounts'));
		} catch (\Exception $e) {
			return response()->json(['success' => false, 'msg' => $e->getMessage()]);
		}
	}

	
	public function studProfile()
    {
        $userData = Auth::user();
        return view('student.profile', compact('userData'));
    }

    public function studEditProfile(Request $request)
    {
        try {
			$user = Auth::user();

			// Get the existing user data
			$userData = User::find($user->id);

			if ($request->hasFile('profile_pic')) {
				// Handle profile picture update
				$uploadedFile = $request->file('profile_pic');
				$originalFileName = $uploadedFile->getClientOriginalName();

				// Check if an image with the same name already exists
				if (Storage::exists("public/{$originalFileName}")) {
					return response()->json(['success' => false, 'msg' => 'Image with the same name already exists.']);
				}

				// Check if the filename is used by another user
				$filenameInUse = User::where('profile_pic', $originalFileName)
					->where('id', '!=', $user->id)
					->exists();

				if ($filenameInUse) {
					return response()->json(['success' => false, 'msg' => 'Filename is already used by another user. Please upload another image.']);
				}

				// Store the new image in the storage/app/public directory with the desired file name
				$path = $uploadedFile->storeAs('public', $originalFileName);

				Log::info('Stored File Name:', ['storedFileName' => $originalFileName]);

				// Update the user's profile_pic field in the database
				$userData->profile_pic = $originalFileName;
			}

			// Handle name update
			$newName = $request->input('name');
			if ($newName && $newName !== $userData->name) {
				$userData->name = $newName;
			}

			// Handle email update
			$newEmail = $request->input('email');
			if ($newEmail && $newEmail !== $userData->email) {
				// Check for email format and uniqueness
				if (filter_var($newEmail, FILTER_VALIDATE_EMAIL) && User::where('email', $newEmail)->doesntExist()) {
					$userData->email = $newEmail;
				} else {
					return response()->json(['success' => false, 'msg' => 'Invalid or duplicate email address.']);
				}
			}

			// Save the updated user data
			$userData->save();

			// Get all images associated with any user in the database
			$existingImagesInDatabase = User::pluck('profile_pic')->all();

			// Get all images in the storage directory
			$allImages = array_map('basename', Storage::files('public'));

			// Identify images to be deleted (all except the latest associated image)
			$imagesToDelete = array_diff($allImages, [$userData->profile_pic], $existingImagesInDatabase);

			foreach ($imagesToDelete as $imageToDelete) {
				Storage::delete('public/' . $imageToDelete);
			}

			// After updating and deleting, log the list of files in the storage directory
			Log::info('Files after update:', ['files' => Storage::files('public')]);

			return response()->json(['success' => true, 'msg' => 'Profile Updated Successfully!']);
		} catch (\Exception $e) {
			return response()->json(['success' => false, 'msg' => $e->getMessage()]);
		}
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

    public function forgotPasswordLoad()
    {
        return view('forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        try{
            $user = User::where('email',$request->email)->get();

            if (count ($user) > 0) {
                $token = Str :: random(40);
                $domain = URL :: to('/');
                $url = $domain. '/reset-password?token='.$token;

                $data['url'] = $url;
                $data['email'] = $request->email;
                $data['title'] = 'Password Reset';
                $data['body'] = 'Please click on below link to reset your password. ';

                Mail::send('forgotPasswordMail', ['data'=>$data], function($message) use($data) {
                    $message->to($data['email'])->subject($data['title']);
                });

                $dateTime = Carbon::now()->format('Y-m-d H:i:s');

                // PasswordReset::updateOnCreate(
                //     ['email'=>$request->email],
                //     [
                //         'email' => $request->email,
                //         'token' => $token,
                //         'created_at' => $dateTime
                //     ]
                // );
                PasswordReset::updateOrInsert(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $dateTime
                    ]
                );

                return back()->with('success', 'A link has been sent to reset password');
            }
            else{
                return back()->with('error', 'Email is not exists!');
            }
            
        }catch(\Exception $ex){
            return back()->with('error',$ex->getMessage());
        }
    }

    public function resetPasswordLoad(Request $request)
    {
        $resetData = PasswordReset::where('token', $request->token)->get();

        if(isset($request->token) && count($resetData) > 0)
        {
            $user = User::where('email', $resetData[0]['email'])->get();

            return view('resetPassword', compact('user'));
        }
        else{
            return view('404');
        }
    }

    public function resetPassword(Request $request){
        $request->validate([
            'password' => 'required|string|min:4|confirmed'
        ]);

        $user = User::find($request->id);

        $user->password = Hash::make($request->password);
        $user->save();

        PasswordReset::where('email', $user->email)->delete();
        
        //return "<h2>You password has been reset successfully!</h2>";
        //return redirect('/')->with('success', 'Password reset successful. Please log in.');
    }
}
