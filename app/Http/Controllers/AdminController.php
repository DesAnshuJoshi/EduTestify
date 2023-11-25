<?php

namespace App\Http\Controllers;

use App\Models\ExamAnswer;
use App\Models\ExamAttempt;
use App\Models\ExamPayments;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use App\Models\QnaExam;

use App\Imports\QnaImport;
use App\Exports\ExportStudent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\Hash;
// use Mail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    //
    public function adminSubjects()
    {
        $subjects = Subject::all();
        return view('admin.subjects', compact('subjects'));
    }
    public function addSubject(Request $request)
    {
        try{
            Subject::insert([
                'subject' => $request->subject,
                'sub_code' => $request->subject_code
            ]);
            return response()->json(['success'=>true, 'msg'=>"Subject Added Successfully!"]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function editSubject(Request $request)
    {
        try{
            $subject = Subject::find($request->id);
            $subject->subject = $request->subject;
            $subject->sub_code = $request->subject_code;
            $subject->save();
            return response()->json(['success'=>true, 'msg'=>"Subject Updated Successfully!"]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function deleteSubject(Request $request)
    {
        try{
            Subject::where('id', $request->id)->delete();
            Exam::where('subject_id', $request->id)->delete();
            return response()->json(['success'=>true, 'msg'=>"Subject Deleted Successfully!"]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function examDashboard()
    {

        $subjects = Subject::all();
        $exams = Exam::with('subjects')->get();
        return view('admin.exam-dashboard', ['subjects'=>$subjects, 'exams'=>$exams]);
    }

    public function addExam(Request $request)
    {
        try{
            $plan = $request->plan;
            $prices = null;
            
            if(isset($request->inr) && isset($request->usd)){
                $prices = json_encode(['INR'=>$request->inr,'USD'=>$request->usd]);
            }
            
            $unique_id = uniqid('exid');
            Exam::insert([
                'exam_name' => $request->exam_name,
                'subject_id' => $request->subject_id,
                'date' => $request->date,
                'time' => $request->time,
                'attempt' => $request->attempt,
                'enterance_id' =>$unique_id,
                'plan' => $plan,
                'prices' => $prices
            ]);
            return response()->json(['success'=>true, 'msg'=>"Exam Added Successfully!"]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function getExamDetail($id)
    {
        try{
            $exam = Exam::where('id', $id)->get();
            return response()->json(['success'=>true, 'data'=> $exam ]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function updateExam(Request $request)
    {
        try{
            $plan = $request->plan;
            $prices = null;
            
            if(isset($request->inr) && isset($request->usd)){
                $prices = json_encode(['INR'=>$request->inr,'USD'=>$request->usd]);
            }

            $exam = Exam::find($request->exam_id);
            $exam->exam_name = $request->examName;
            $exam->subject_id = $request->subject_id;
            $exam->date = $request->date;
            $exam->time = $request->time;
            $exam->attempt = $request->attempt;
            $exam->plan = $plan;
            $exam->prices = $prices;
            $exam->save();
            return response()->json(['success'=>true, 'msg'=> "Exam Updated Successfully!" ]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function deleteExam(Request $request)
    {
        try{
            Exam::where('id', $request->id)->delete();
            return response()->json(['success'=>true, 'msg'=>"Exam Deleted Successfully!"]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function qnaDashboard()
    {
        $questions = Question::with('answers')->get();
        return view('admin.qnaDashboard', compact('questions'));
    }

    public function addQna(Request $request){
        try{

            $explaination = null;
            if(isset($request->explaination)){
                $explaination = $request->explaination; 
            }

            $questionId = Question::insertGetId([
                'question' => $request->question,
                'explaination' => $explaination
            ]);
            foreach($request->answers as $answer){
                $is_correct = 0;

                if($request->is_correct == $answer){
                    $is_correct = 1;
                }
                Answer::insert([
                    'questions_id' => $questionId,
                    'answer' => $answer,
                    'is_correct' => $is_correct
                ]);
            }
            return response()->json(['success'=>true, 'msg'=>"Added Question Successfully!"]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function editQnaInfo(Request $request)
    {
        $quest = Question::where('id', $request->qid)->with('answers')->get();
        return response()->json(['data'=>$quest]);
    }

    public function deleteAns(Request $request)
    {
        Answer::where('id',$request->id)->delete();
        return response()->json(['success'=>true,'msg'=>'Answer deleted successfully!']);
    }

    public function updateQna(Request $request)
    {
        try{

            $explaination = null;
            if(isset($request->explaination)){
                $explaination = $request->explaination; 
            }

            Question::where('id',$request->question_id)->update([
                'question' => $request->question,
                'explaination' => $explaination
            ]);

            //old answer update
            if(isset($request->answers)){

                foreach($request->answers as $key => $value){

                    $edit_is_correct = 0;
                    if($request->edit_is_correct == $value){
                        $edit_is_correct = 1;
                    }

                    Answer::where('id',$key)
                    ->update([
                        'questions_id' => $request->question_id,
                        'answer' => $value,
                        'is_correct' => $edit_is_correct
                    ]);

                }

            }

            //new answers added
            if(isset($request->new_answers)){

                foreach($request->new_answers as $answer){

                    $edit_is_correct = 0;
                    if($request->edit_is_correct == $answer){
                        $edit_is_correct = 1;
                    }

                    Answer::insert([
                        'questions_id' => $request->question_id,
                        'answer' => $answer,
                        'is_correct' => $edit_is_correct
                    ]);

                }

            }

            return response()->json(['success'=>true,'msg'=>'Q&A updated successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        };

        // return response()->json($request->all());
    }

    public function deleteQna(Request $request)
    {
        try{
            Question::where('id',$request->id)->delete();
            Answer::where('questions_id',$request->id)->delete();
            QnaExam::where('question_id', $request->id)->delete();
            return response()->json(['success'=>true, 'msg'=>"Exam Deleted Successfully!"]); 

        }catch(\Exception $e){
            return response()->json(['success'=>false, 'msg'=>$e->getMessage()]); 
        }
    }

    public function importQna(Request $request)
    {
        try{

            Excel::import(new QnaImport, $request->file('file'));

            return response()->json(['success'=>true,'msg'=>'Import Q&A successfuly!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }

    }

    public function studentDashboard()
    {
        $student = User::where('is_admin',0)->get();
        return view('admin.studentDashboard', compact('student'));
    }

    public function addStudent(Request $request)
    {
        try{

            $password = Str::random(8);

            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password)
            ]);

            $url = URL::to('/');

            $data['url'] = $url;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = $password;
            $data['title'] = "Student Registeration on EduTestify";

            Mail::send('registerationMail',['data'=>$data],function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });
            return response()->json(['success'=>true,'msg'=>'Student Saved Successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function editStudent(Request $request)
    {
        try{

            $user = User::find($request->id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            $url = URL::to('/');

            $data['url'] = $url;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['title'] = "Updated Student Profile on OES";

            Mail::send('updateProfileMail',['data'=>$data],function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });
            return response()->json(['success'=>true,'msg'=>'Student Updated Successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function deleteStudent(Request $request)
    {
        try {
            //Get Attempt ID based user ID
            $userId = $request->id;
            $attemptIds = ExamAttempt::where('user_id', $userId)->pluck('id');

            //Deletion happens in order
            ExamAnswer::whereIn('attempt_id', $attemptIds)->delete();
            ExamAttempt::where('user_id', $userId)->delete();
            ExamPayments::where('user_id', $userId)->delete();
            User::where('id', $userId)->delete();


            return response()->json(['success'=>true,'msg'=>'Student Deleted successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function exportStudents()
    {
        return Excel::download(new ExportStudent, 'students.xlsx');
    }

    public function getQuestions(Request $request)
    {
        try {
         
            $questions = Question::all();

            if(count($questions) > 0){

                $data = [];
                $counter = 0;

                foreach($questions as $question)
                {
                    $qnaExam = QnaExam::where(['exam_id'=>$request->exam_id,'question_id'=>$question->id])->get();
                    if(count($qnaExam) == 0){
                        $data[$counter]['id'] = $question->id;
                        $data[$counter]['questions'] = $question->question;
                        $counter++;
                    }
                }
                return response()->json(['success'=>true,'msg'=>'Questions data!','data'=>$data]);
            }
            else{
                return response()->json(['success'=>false,'msg'=>'Questions not Found!']);
            }

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function addQuestions(Request $request)
    {
        try{

            if(isset($request->questions_ids)){

                foreach($request->questions_ids as $qid){
                    QnaExam::insert([
                        'exam_id' => $request->exam_id,
                        'question_id' => $qid
                    ]);
                }

            }
            return response()->json(['success'=>true,'msg'=>'Questions added successfully!']);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function getExamQuestions(Request $request)
    {
        try {
            $data = QnaExam::where('exam_id',$request->exam_id)->with('question')->get();

            return response()->json(['success'=>true,'msg'=>'Questions deatils!','data'=>$data]);
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function deleteExamQuestions(Request $request)
    {
        try {
            
            QnaExam::where('id',$request->id)->delete();
            return response()->json(['success'=>true,'msg'=>'Questions deleted!']);
            
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function loadMarks()
    {
        $exams = Exam::with('getQnaExam')->get();
        return view('admin.marksDashboard',compact('exams'));
    }

    public function updateMarks(Request $request)
    {
        try {
            
            Exam::where('id',$request->exam_id)->update([
                'marks' => $request->marks,
                'pass_marks' => $request->pass_marks
            ]);
            return response()->json(['success'=>true,'msg'=>'Marks Updated!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function reviewExams()
    {
        $attempts = ExamAttempt::with(['user','exam'])->orderBy('id')->get();

        return view('admin.review-exams',compact('attempts'));
    }

    public function reviewQna(Request $request)
    {
        try {
            
         $attemptData = ExamAnswer::where('attempt_id',$request->attempt_id)->with(['question','answers'])->get();
        
         return response()->json(['success'=>true,'data'=>$attemptData]);
        
        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }

    }

    public function approvedQna(Request $request)
    {
        try{
        
            $attemptId = $request->attempt_id;
            
            $examData = ExamAttempt::where('id',$attemptId)->with(['user','exam'])->get();
            $marks = $examData[0]['exam']['marks'];

            $attemptData = ExamAnswer::where('attempt_id',$attemptId)->with('answers')->get();

            $totalMarks = 0;

            if(count($attemptData) > 0){

                foreach($attemptData as $attempt){

                    if($attempt->answers->is_correct == 1){
                        $totalMarks += $marks;
                    }

                }

            }

            ExamAttempt::where('id',$attemptId)->update([
                'status' => 1,
                'marks'  => $totalMarks
            ]);

            $url = URL::to('/');

            $data['url'] = $url.'/results';
            $data['name'] = $examData[0]['user']['name'];
            $data['email'] = $examData[0]['user']['email'];
            $data['exam_name'] = $examData[0]['exam']['exam_name'];
            $data['title'] = $examData[0]['exam']['exam_name'].' Result';

            Mail::send('result-mail',['data' => $data], function($message) use ($data){
                $message->to($data['email'])->subject($data['title']);
            });

            return response()->json(['success'=>true,'msg'=>'Approved Successfully!']);

        }catch(\Exception $e){
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function loadPackageDashboard()
    {
        $exams = Exam::where('plan',0)->get();
        $packages = Package::orderBy('created_at','DESC')->get();

        return view('admin.packageDashboard',compact(['exams','packages']));
    }

    public function addPackage(Request $request)
    {
        $exmIds = [];
        foreach($request->exams as $exam)
        {
            $exmIds[] = (int)$exam;
        }

        $price = json_encode(
            [
                'INR' => $request->price_inr,
                'USD' => $request->price_usd
            ]
        );

        Package::insert([
            'name' => $request->package_name,
            'exam_id' => json_encode($exmIds),
            'price' => $price,
            'expiry' => $request->expiry
        ]);
        return redirect()->back();
    }

    public function deletePackage(Request $request)
    {
        try {

            Package::where('id',$request->id)->delete();

            return response()->json(['success'=>true,'msg'=>'Package deleted Successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
        }
    }

    public function editPackage(Request $request)
    {
        $exmIds = [];
        foreach($request->exams as $exam)
        {
            $exmIds[] = (int)$exam;
        }

        $price = json_encode(
            [
                'INR' => $request->price_inr,
                'USD' => $request->price_usd
            ]
        );

        Package::where('id',$request->package_id)->update([
            'name' => $request->package_name,
            'exam_id' => json_encode($exmIds),
            'price' => $price,
            'expiry' => $request->expiry
        ]);
        return redirect()->back();
    }

    public function paymentDetails()
    {
        $paymentDetails = ExamPayments::with(['exam','user'])->orderBy('id','DESC')->get();
        return view('admin.payment-details',compact('paymentDetails'));
    }

}
