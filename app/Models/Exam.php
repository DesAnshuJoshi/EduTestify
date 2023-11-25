<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ExamAttempt;
use Illuminate\Support\Facades\DB;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_name',
        'subject_id',
        'date',
        'time',
        'attempt',
        'plan',
        'prices'
    ];

    protected $appends = ['attempt_counter','check_in_exists_package','is_package_exam','package','isPaid'];
    public $count = '';
    public $package_exist = '',$is_package_exam = false,$examId = '',$isPaid = false;

    public function subjects()
    {
        return $this->hasMany(Subject::class,'id','subject_id');
    }

    public function getQnaExam()
    {
        return $this->hasMany(QnaExam::class,'exam_id','id');
    }

    public function getIdAttribute($value)
    {
        $attemptCount = ExamAttempt::where(['exam_id'=>$value,'user_id'=> auth()->user()->id])->count();
        $this->count = $attemptCount;

        $tempExists = DB::select('SELECT * FROM `packages` WHERE JSON_CONTAINS(exam_id,?)',[$value]);

        $checkAttemptExam = ExamAttempt::where('exam_id',$value)->count();

        if(count($tempExists) > 0){
            $this->package_exist = true;
            $this->is_package_exam = true;
        }
        else{
            $this->package_exist = false;
            if($checkAttemptExam > 0){
                $this->package_exist = true;
            }
        }
        $this->examId = $value;

        //checking exam is exists in exam payments table
        $paidCount = ExamPayments::where(['exam_id'=>$value,'user_id'=>auth()->user()->id])->count();

        if($paidCount > 0){
            $this->isPaid = true;
        }

        return $value;
    }

    public function getPaidInformation()
    {
        return $this->hasMany(ExamPayments::class,'exam_id','id');
    }

    public function getAttemptCounterAttribute()
    {
        return $this->count;
    }

    public function getCheckInExistsPackageAttribute()
    {
        return $this->package_exist;
    }

    public function getIsPackageExamAttribute()
    {
        return $this->is_package_exam;
    }

    public function getPackageAttribute()
    {
        $packageData = DB::select('SELECT * FROM `packages` WHERE JSON_CONTAINS(exam_id,?)',[$this->examId]);
        return $packageData;
    }

    public function getIsPaidAttribute()
    {
        return $this->isPaid;
    }
}
