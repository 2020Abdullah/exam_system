<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'time',
        'image',
        'available_date',
        'available_time'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function quetions(){
        return $this->hasMany(ExamQuestion::class, 'exam_id');
    }

    public function attempt(){
        return $this->hasOne(ExamAttemp::class, 'exam_id');
    }

    protected $casts = [
        'answers' => 'array', // تحويل الحقل JSON إلى مصفوفة تلقائياً
    ];

}
