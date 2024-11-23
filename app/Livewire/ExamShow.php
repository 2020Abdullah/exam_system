<?php

namespace App\Livewire;

use App\Models\ExamAttemp;
use App\Models\ExamForm;
use App\Models\ExamQuestion;
use Carbon\Carbon;
use Livewire\Component;

class ExamShow extends Component
{
    public $exam, $formExam;
    public $answers = [];
    public $timeRemaining = 1; // الوقت المتبقي للعد التنازلي
    public $totalScore;
    public $score = 0;

    protected $rules = [
        'answers.*' => 'required',
    ];

    public function mount(){
        $this->timeRemaining = $this->exam->time * 60 - Carbon::now()->diffInSeconds($this->formExam->started_at);
    }

    public function decrementTimer(){
        $this->timeRemaining--;
        if($this->timeRemaining <= 0){
            $this->submitExam();
        }
    }

    public function submitExam()
    {
        $this->validate();

        foreach($this->exam->quetions as $q){
            $selectedAnswer = $this->answers[$q->id] ?? null;

            // التحقق من صحة الإجابة
            $isCorrect = ($selectedAnswer === $q->right_answer);

            // إذا كانت الإجابة صحيحة، أضف درجة السؤال إلى المجموع
            if($isCorrect){
                $this->totalScore += $q->score;
                $this->score = $q->score;
            }

            // تسجيل الإجابة في جدول exam_forms
            ExamForm::create([
                'exam_id'     => $this->exam->id,
                'student_id'  => auth('student')->user()->id,
                'question_id' => $q->id,
                'selected_answer' => $selectedAnswer,
                'is_correct'     => $isCorrect,
                'score'          => $this->score
            ]);

      
        }

        // حفظ مجموع الدرجات في نموذج الطالب
        $formAttamp = ExamAttemp::where('student_id', auth('student')->user()->id)->where('exam_id', $this->exam->id);
        $formAttamp->update([
            'is_completed' => true,
            'score'        => $this->totalScore
        ]);

        // إعادة توجيه بعد حفظ الإجابات
        return redirect()->route('exam.result', $this->exam->id);

    }

    public function render()
    {
        return view('livewire.exam-show');
    }
}
