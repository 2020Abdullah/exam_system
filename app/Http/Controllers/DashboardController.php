<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use App\Models\ExamAttemp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard(){
        $data['categoryCount'] = Category::count();
        if(auth('web')->check() && auth('web')->user()->role === 'admin'){
            $data['examCount'] = Exam::count();
            $data['exam_list'] = Exam::with('category')->get();
        }
        elseif(auth('web')->check() && auth('web')->user()->role === 'teacher'){
            $data['examCount'] = Exam::where('Added_by', auth('web')->user()->id)->count();
            $data['exam_list'] = Exam::where('Added_by', auth('web')->user()->id)->with('category')->get();
        }
        else {
            $data['examCount'] = Exam::count();
            $data['exam_list'] = Exam::with('attempt')->get();
        }
        return view('dashboard', $data);
    }
    public function logout(Request $request){
        if(Auth::guard('student')->check()){
            Auth::guard('student')->logout();
        }
        else {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
