<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'exam_id',
        'price',
        'expire'
    ];

    protected $appends = ['is_paid'];
    public $isPaid = '';

    public function getExamIdAttribute($value)
    {
        $examIds = json_decode($value);

        $exams = Exam::whereIn('id',$examIds)->get();

        $countPaid = ExamPayments::where('user_id',auth()->user()->id)->whereIn('exam_id',$examIds)->count();

        $this->isPaid = $countPaid;

        return $exams;
    }

    public function getIsPaidAttribute()
    {
        return $this->isPaid;
    }
}
