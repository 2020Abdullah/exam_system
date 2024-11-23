<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index(){
        $teacher_list = User::where('id', '!=' ,auth('web')->user()->id)->get();
        return view('teacher.index', compact('teacher_list'));
    }

    public function store(Request $request){
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email  = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->role = 'teacher';
        $teacher->status = 1;
        $teacher->save();
        return back()->with('success', 'تم إضافة المدرس بنجاح');
    }

    public function update(Request $request){
        $teacher = User::where('id', $request->teacher_id)->first();
        $teacher->name = $request->name;
        $teacher->email  = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->save();
        return back()->with('success', 'تم تعديل بيانات المدرس بنجاح');
    }

    public function delete(Request $request){
        $teacher = User::where('id', $request->teacher_id)->first();
        $teacher->status = 0;
        $teacher->save();
        return back()->with('success', 'تم تعطيل حساب المدرس بنجاح');
    }

    public function accountActive($id){
        $teacher = User::where('id', $id)->first();
        $teacher->status = 1;
        $teacher->save();
        return back()->with('success', 'تم تفعيل حساب المدرس بنجاح');
    }
}
