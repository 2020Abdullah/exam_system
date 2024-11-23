<?php

namespace App\Livewire;

use App\Models\Exam;
use App\Models\ExamQuestion as ModelsExamQuestion;
use Livewire\Component;

class ExamQuestion extends Component
{
    public $exam;
    public  $title, $answers, $right_answer, $score = 1;
    public $Allanswers = [];
    public $questions = []; // مصفوفة لتخزين جميع الأسئلة المضافة
    public $msg;

    public function mount()
    {
        // إضافة حقل إدخال فارغ عند تحميل الصفحة
        $this->Allanswers[] = '';
    }

    // دالة لإضافة حقل إجابة جديد
    public function addAnswerField()
    {
        $this->Allanswers[] = ''; // إضافة حقل فارغ جديد للمصفوفة
    }

    // دالة لحذف حقل إجابة معين
    public function removeAnswerField($index)
    {
        unset($this->Allanswers[$index]);
        $this->Allanswers = array_values($this->Allanswers); // إعادة ترتيب المصفوفة
    }

    public function addQuestion(){

        $this->validate([
            'title' => 'required|string',
            'Allanswers' => 'required|array|min:1',
            'Allanswers.*' => 'required|string', // التحقق من كل إجابة
            'right_answer' => 'required|string',
            'score' => 'required|integer',
        ]);

        $this->questions[] = [
            'title' => $this->title,
            'answers' => json_encode($this->Allanswers),
            'right_answer' => $this->right_answer,
            'score' => $this->score,
            'exam_id' => $this->exam->id,
            'Added_by' => auth()->user()->id,
        ];

        $this->reset(['title', 'answers', 'right_answer', 'score']);

        $this->Allanswers = ['']; // إعادة حقل إدخال الإجابة الأول
    }

    public function saveQuetionsToDB(){
        // حفظ جميع الأسئلة في قاعدة البيانات دفعة واحدة
        foreach($this->questions as $q){
            ModelsExamQuestion::create($q);
        }
        // إعادة تعيين المصفوفة بعد الحفظ
        $this->reset(['questions']);

        // set message success
        $this->msg = 'تم إضافة أسئلة الإختبار بنجاح';

        // إرسال حدث إلى المتصفح بعد حفظ البيانات
        $this->dispatch('question-saved');
    }

    public function quetionDelete($index){
        unset($this->questions[$index]); // حذف السؤال حسب الـ index
        $this->questions = array_values($this->questions); // إعادة ترتيب الصفيف بعد الحذف
    }

    public function render()
    {
        return view('livewire.exam-question');
    }
}
