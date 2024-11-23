<?php

namespace App\Exports;

use App\Models\Exam;
use App\Models\ExamAttemp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class examReportExcel implements FromView, WithEvents
{
    public $exam_id;

    public function __construct($exam_id)
    {
        $this->exam_id = $exam_id;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }


    public function view(): View
    {
        $data['exam'] = Exam::with('quetions')->where('id', $this->exam_id)->first();
        $data['passingScore'] = $data['exam']->quetions->sum('score') * 0.5;
        $data['reports'] = ExamAttemp::where('exam_id', $this->exam_id)->get();
        return view('exam.report_export', $data);
    }
    
}
