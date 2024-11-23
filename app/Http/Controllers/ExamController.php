<?php

namespace App\Http\Controllers;

use App\Exports\examReportExcel;
use App\Models\Category;
use App\Models\Exam;
use App\Models\ExamAttemp;
use App\Models\ExamForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExamController extends Controller
{
    public function createExam(){
        $cate_list = Category::all();
        return view('exam.create', compact('cate_list'));
    }

    public function storeExam(Request $request){

        $request->validate([
            'title'  => 'required',
            'time'  => 'required',
            'category_id'  => 'required',
            'available_date' => 'required|date',
            'available_time' => 'required|date_format:H:i',
        ]);

        $exam = new Exam();
        if($request->hasFile('image')){
            $generateFile = time() . '.' . $request->image->extension();
            $folder = public_path('images/exam');
            $request->image->move($folder, $generateFile);
            $imagePath = 'images/exam/' . $generateFile;
            $exam->image = $imagePath;
        }
        $exam->title = $request->title;
        $exam->time = $request->time;
        $exam->available_date = $request->available_date;
        $exam->available_time = $request->available_time;
        $exam->category_id = $request->category_id;
        $exam->Added_by = auth('web')->user()->id;
        $exam->save();
        return redirect()->route('user.exam.question.store', ['exam_id' => $exam->id])->with('success', 'تم انشاء اختبار جديد');
    }

    public function editExam($id){
        $data['exam'] = Exam::findOrFail($id);
        $data['cate_list'] = Category::all();
        return view('exam.edit', $data);
    }

    public function updateExam(Request $request){
        $exam = Exam::where('id', $request->id)->first();

        if($request->hasFile('image')){
            // delete old image 
            $old_img = asset($exam->image);
            if(file_exists($old_img)){
                unlink($old_img);
            }
            // add new image
            $generateFile = time() . '.' . $request->image->extension();
            $folder = public_path('images/exam');
            $request->image->move($folder, $generateFile);
            $imagePath = 'images/exam/' . $generateFile;
            $exam->image = $imagePath;
        }
        $exam->title = $request->title;
        $exam->time = $request->time;
        $exam->available_date = $request->available_date;
        $exam->available_time = $request->available_time;
        $exam->category_id = $request->category_id;
        $exam->save();
        return redirect()->route('user.dashboard')->with('success', 'تم تعديل بيانات الإختبار بنجاح');
    }

    public function questionCreate($exam_id){
        $exam = Exam::find($exam_id);
        return view('exam.questionStore', compact('exam'));
    }

    public function quetionsView($id){
        $exam = Exam::with('quetions')->where('id', $id)->first();
        return view('exam.quetionsShow', compact('exam'));
    }

    public function showExam($id){
        $exam = Exam::where('id', $id)->first();
        $examDateTime = Carbon::parse($exam->available_date . ' ' . $exam->available_time);
        $currentDateTime = \Carbon\Carbon::now();

        // check exam available 
        if($currentDateTime >= $examDateTime){
            // create form student 
            $formExam = ExamAttemp::firstOrCreate(
                ['student_id' => auth('student')->user()->id, 'exam_id' => $id, 'is_completed' => 1],
                [
                    'exam_id' => $id,
                    'student_id' => auth('student')->user()->id,
                    'started_at' => Carbon::now()
                ]
            );
            return view('exam.show', compact('exam', 'formExam'));          
        }
        else {
            return back()->with('error', 'لم يتم فتح الإختبار بعد');
        }
    }

    public function showExamResult($id){
        $data['exam'] = Exam::where('id', $id)->first();
        $data['passingScore'] = $data['exam']->quetions->sum('score') * 0.5;
        $data['total_score'] = ExamAttemp::where('exam_id', $id)->pluck('score')->first();
        $data['FormResult'] = ExamForm::with('question')->where('exam_id', $id)->where('student_id', auth('student')->user()->id)->get();
        return view('exam.result', $data); 
    }

    public function showExamReports($id){
        $data['exam'] = Exam::with('quetions')->where('id', $id)->first();
        $data['passingScore'] = $data['exam']->quetions->sum('score') * 0.5;
        $data['examReports'] = ExamAttemp::where('exam_id', $id)->get();
        return view('exam.reports', $data);
    }

    public function reportExport($exam_id){
        return Excel::download(new examReportExcel($exam_id), 'تقرير الطلاب.xlsx');
    }
}
