<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamForm extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "exam_forms";

    public function question(){
        return $this->belongsTo(ExamQuestion::class, 'question_id');
    }
}
