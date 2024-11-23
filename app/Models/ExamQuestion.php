<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'answers',
        'right_answer',
        'score',
        'exam_id',
        'Added_by',
    ];

    protected $casts = [
        'answers' => 'array', // تحويل الحقل JSON إلى مصفوفة تلقائياً
    ];

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
