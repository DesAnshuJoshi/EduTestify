<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\QnaExam;
use App\Models\ExamAttempt;
use App\Models\ExamAnswer;
use App\Models\ExamPayments;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

use Razorpay\Api\Api;

class StudentController extends Controller
{
    //
    public function paidExamDashboard()
    {
        $exams = Exam::where('plan',1)->with(['subjects','getPaidInformation'])->orderBy('date','DESC')->get();
        return view('student.paid-exams',['exams'=>$exams]);
    }

    public function paymentInr(Request $request)
    {

        try {
            
            $api = new Api(env('PAYMENT_KEY'),env('PAYMENT_SECRET'));

            $orderData = [
                'receipt'         => 'rcptid_11',
                'amount'          => $request->price.'00', // 39900 rupees in paise
                'currency'        => 'INR'
            ];

            $razorpayOrder = $api->order->create($orderData);

            return response()->json(['success'=>true,'order_id'=>$razorpayOrder['id']]);
        } catch (\Exception $e) {
            
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }

    }

    public function verifyPayment(Request $request)
    {

        try {
            
            $api = new Api(env('PAYMENT_KEY'),env('PAYMENT_SECRET'));

            $attributes = array(
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            );
    
            $api->utility->verifyPaymentSignature($attributes);

            ExamPayments::insert([
                'exam_id' => $request->exam_id,
                'user_id' => auth()->user()->id,
                'payment_details' => json_encode($attributes)
            ]);

            return response()->json(['success'=>true,'msg'=>'Your payment was successful, Your payment ID '.$request->razorpay_payment_id]);
        } catch (\Exception $e) {
            
            return response()->json(['success'=>false,'msg'=>'Your payment failed']);

        }

    }

    public function paymentStatus(Request $request, $examid)
    {
        if($request->PayerID){

            $data = array(
                'PayerID' => $request->PayerID 
            );

            ExamPayments::insert([
                'exam_id' => $examid,
                'user_id' => auth()->user()->id,
                'payment_details' => json_encode($data)
            ]);

            // $message = 'Your payment has been done';
            $message = '0';

            return view('paymentUSD',compact('message'));

        }
        else{
            // $message = 'Your payment failed!';
            $message = '1';

            return view('paymentUSD',compact('message'));
        }
    }

    public function paidPackagePlans()
    {
        $packages = Package::orderBy('created_at','desc')->get();
        return view('student.paidPackagePlans',compact('packages'));
    }

    public function packagePaymentInr(Request $request)
    {

        try {
            
            $api = new Api(env('PAYMENT_KEY'),env('PAYMENT_SECRET'));

            $orderData = [
                'receipt'         => 'rcptid_11',
                'amount'          => $request->price.'00', // 39900 rupees in paise
                'currency'        => 'INR'
            ];

            $razorpayOrder = $api->order->create($orderData);

            return response()->json(['success'=>true,'order_id'=>$razorpayOrder['id']]);
        } catch (\Exception $e) {
            
            return response()->json(['success'=>false,'msg'=>$e->getMessage()]);

        }

    }

    public function verifyPackagePayment(Request $request)
    {

        try {
            
            $api = new Api(env('PAYMENT_KEY'),env('PAYMENT_SECRET'));

            $attributes = array(
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            );
    
            $api->utility->verifyPaymentSignature($attributes);

            $packageData = Package::where('id',$request->package_id)->get();

            $exams = $packageData[0]['exam_id'];

            foreach($exams as $exam){
                ExamPayments::insert([
                    'exam_id' => $exam->id,
                    'user_id' => auth()->user()->id,
                    'payment_details' => json_encode($attributes)
                ]);
            }

            return response()->json(['success'=>true,'msg'=>'Your payment was successful, Your payment ID '.$request->razorpay_payment_id]);
        } catch (\Exception $e) {
            
            return response()->json(['success'=>false,'msg'=>'Your payment failed']);

        }

    }

    public function packagePaymentStatus(Request $request, $packageid)
    {
        if($request->PayerID){

            $data = array(
                'PayerID' => $request->PayerID 
            );

            $packageData = Package::where('id',$packageid)->get();

            $exams = $packageData[0]['exam_id'];

            foreach($exams as $exam){
                ExamPayments::insert([
                    'exam_id' => $exam->id,
                    'user_id' => auth()->user()->id,
                    'payment_details' => json_encode($data)
                ]);
            }

            // $message = 'Your payment has been done';
            $message = '0';

            return view('packagePaymentUSD',compact('message'));

        }
        else{
            // $message = 'Your payment failed!';
            $message = '1';

            return view('packagePaymentUSD',compact('message'));
        }
    }
}
