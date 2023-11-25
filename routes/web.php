<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'loadRegister']);
Route::post('/register', [AuthController::class, 'studentRegister'])->name('studentRegister');

Route::get('/login', function () {
    return redirect('/');
});

Route::get('/', [AuthController::class, 'loadLogin']);
Route::post('/login', [AuthController::class, 'userLogin'])->name('userLogin');

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/forgot-password', [AuthController::class, 'forgotPasswordLoad']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');

Route::get('/reset-password', [AuthController::class, 'resetPasswordLoad']);
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('resetPassword');



Route::group(['middleware'=>['web', 'checkAdmin']], function(){
    Route::get('/admin/dashboard', [AuthController::class, 'adminDashboard']);
    Route::get('/admin/profile', [AuthController::class, 'adminProfile']);
    Route::post('/edit-profile', [AuthController::class, 'editProfile'])->name('editProfile');
    
    //subjects route
    Route::get('/admin/subjects', [AdminController::class, 'adminSubjects']);
    Route::post('/add-subject', [AdminController::class, 'addSubject'])->name('addSubject');
    Route::post('/edit-subject', [AdminController::class, 'editSubject'])->name('editSubject');
    Route::post('/delete-subject', [AdminController::class, 'deleteSubject'])->name('deleteSubject');

    Route::get('/admin/exam', [AdminController::class, 'examDashboard']);
    Route::post('/add-exam', [AdminController::class, 'addExam'])->name('addExam');
    Route::get('/get-exam-detail/{id}', [AdminController::class, 'getExamDetail'])->name('getExamDetail');
    Route::post('/update-exam', [AdminController::class, 'updateExam'])->name('updateExam');
    Route::post('/delete-exam', [AdminController::class, 'deleteExam'])->name('deleteExam');

    //Q&A
    Route::get('/admin/qna', [AdminController::class, 'qnaDashboard']);
    Route::post('/add-qna', [AdminController::class, 'addQna'])->name('addQna');
    Route::get('/edit-qna-info', [AdminController::class, 'editQnaInfo'])->name('editQnaInfo');
    Route::get('/delete-ans', [AdminController::class, 'deleteAns'])->name('deleteAns');
    Route::post('/update-qna', [AdminController::class, 'updateQna'])->name('updateQna');
    Route::post('/delete-qna',[AdminController::class,'deleteQna'])->name('deleteQna');
    Route::post('/import-qna-ans',[AdminController::class,'importQna'])->name('importQna');

    //Students
    Route::get('/admin/students', [AdminController::class, 'studentDashboard']);
    Route::post('/admin/add-student', [AdminController::class, 'addStudent'])->name('addStudent');
    Route::post('/admin/edit-student', [AdminController::class, 'editStudent'])->name('editStudent');
    Route::post('/admin/delete-student', [AdminController::class, 'deleteStudent'])->name('deleteStudent');
    Route::get('/export-students',[AdminController::class,'exportStudents'])->name('exportStudents');

    //Questions Add
    Route::get('/get-questions',[AdminController::class,'getQuestions'])->name('getQuestions');
    Route::post('/add-questions',[AdminController::class,'addQuestions'])->name('addQuestions');
    Route::get('/get-exam-questions',[AdminController::class,'getExamQuestions'])->name('getExamQuestions');
    Route::get('/delete-exam-questions',[AdminController::class,'deleteExamQuestions'])->name('deleteExamQuestions');

    //Results or Marks
    Route::get('/admin/marks',[AdminController::class,'loadMarks']);
    Route::post('/update-marks',[AdminController::class,'updateMarks'])->name('updateMarks');

    //Review Exams
    Route::get('/admin/review-exams',[AdminController::class,'reviewExams'])->name('reviewExams');
    Route::get('/get-reviewed-qna',[AdminController::class,'reviewQna'])->name('reviewQna');
    Route::post('/approved-qna',[AdminController::class,'approvedQna'])->name('approvedQna');

    //crud packages
    Route::get('/admin/dashboard-package',[AdminController::class,'loadPackageDashboard'])->name('packageDashboard');
    Route::post('/add-package',[AdminController::class,'addPackage'])->name('addPackage');
    Route::get('/delete-package',[AdminController::class,'deletePackage'])->name('deletePackage');
    Route::post('/edit-package',[AdminController::class,'editPackage'])->name('editPackage');

    //payment details
    Route::get('/payment-details',[AdminController::class,'paymentDetails'])->name('paymentDetails');
});

Route::group(['middleware'=>['web', 'checkStudent']], function(){
    Route::get('/dashboard', [AuthController::class, 'loadDashboard']);
    Route::get('/exam/{id}',[ExamController::class,'loadExamDashboard']);

    Route::post('/exam-submit',[ExamController::class,'examSubmit'])->name('examSubmit');

    Route::get('/results',[ExamController::class,'resultDashboard'])->name('resultDashboard');
    Route::get('/review-student-qna',[ExamController::class,'reviewQna'])->name('resultStudentQna');

    Route::get('/paid-exams',[StudentController::class,'paidExamDashboard'])->name('paidExamDashboard');

    //payments route
    Route::post('/payment-inr',[StudentController::class,'paymentInr'])->name('paymentInr');
    Route::get('/verify-payment',[StudentController::class,'verifyPayment'])->name('verifyPayment');

    //PAYPAL USD STATUS
    Route::get('/payment-status/{examid}',[StudentController::class,'paymentStatus']);

    //show paid packages
    Route::get('/paid-package-plans',[StudentController::class,'paidPackagePlans'])->name('paidPackagePlans');

    //packages buy routes
    Route::post('/package-payment-inr',[StudentController::class,'packagePaymentInr'])->name('packagePaymentInr');
    Route::get('/verify-package-payment',[StudentController::class,'verifyPackagePayment'])->name('verifyPackagePayment');

    //buy pacakge usd
    Route::get('/package-payment-status/{packageid}',[StudentController::class,'packagePaymentStatus']);
});