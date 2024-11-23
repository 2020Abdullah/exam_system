<?php

namespace App\Http\Controllers;

use App\Models\ExamAttemp;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        $student_list = Student::all();
        return view('students.index', compact('student_list'));
    }

    public function create(){
        return view('students.add');
    }

    public function edit($id){
        $user = Student::findOrFail($id);
        return view('students.edit', compact('user'));
    }

    public function update(Request $request){
        $user = Student::where('id', $request->id)->first();

        // delete old image

        if($user->profile_img !== null){
            $file_old = asset($user->profile_img);
            if(file_exists($file_old)){
                unlink($file_old);
            }
        }

        // update image 

        if($request->hasFile('image')){
            $generateFile = time() . '.' . $request->image->extension();
            $folder = public_path('images/students');
            $request->image->move($folder, $generateFile);
            $imagePath = 'images/students/' . $generateFile;
            $user->profile_img = $imagePath;
        }

        // update data 
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->school_name = $request->school_name;
        $user->email = $request->email;
        if($request->password !== null){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user.student.index')->with('success', 'تم تعديل البيانات بنجاح');
    }
    
    public function store(Request $request){
        
        $request->validate([
            'name'  => 'required',
            'school_name'  => 'required',
            'city'  => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $student = new Student();

        if($request->hasFile('image')){
            $generateFile = time() . '.' . $request->profile_img->extension();
            $folder = public_path('images/students');
            $request->profile_img->move($folder, $generateFile);
            $imagePath = 'images/students/' . $generateFile;
            $student->profile_img = $imagePath;
        }

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->city = $request->city;
        $student->school_name = $request->school_name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->save();
        return redirect()->route('user.student.index')->with('success', 'تم إضافة البيانات بنجاح');
    }

    public function deactiveAccount(Request $request){
        $student = Student::where('id', $request->student_id);
        $student->update([
            'is_active' => 0
        ]);

        return back()->with('success', 'تم تعطيل حساب الطالب');
    }

    public function activeAccount($id){
        $student = Student::where('id', $id);
        $student->update([
            'is_active' => 1
        ]);
        return back()->with('success', 'تم تفعيل حساب الطالب');
    }

    public function showReportExam($id){
        $data['student'] = Student::findOrFail($id);
        $data['reports'] = ExamAttemp::with('exam')->where('student_id', $id)->get();
        return view('exam.student_report', $data);
    }
}
