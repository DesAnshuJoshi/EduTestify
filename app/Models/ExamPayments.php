<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamPayments extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'user_id',
        'payment_details'
    ];

    public function exam()
    {
        return $this->hasMany(Exam::class,'id','exam_id');
    }

    public function user()
    {
        return $this->hasMany(User::class,'id','user_id');
    }
}
