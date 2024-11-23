<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Exam;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $category_list = Category::all();
        return view('category.index', compact('category_list'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ], $request->all());

        Category::create([
            'name' => $request->name,
            'Added_by' => auth('web')->user()->id
        ]);

        return back()->with('success', 'تم إضافة القسم بنجاح');
    }

    public function update(Request $request){
        $cate = Category::where('id', $request->cate_id);
        $cate->update([
            'name' => $request->name
        ]);
        return back()->with('success', 'تم تعديل القسم بنجاح');
    }

    public function show($category_id){
        $data['category'] = Category::where('id', $category_id)->first();
        if(auth('web')->check() && auth('web')->user()->role === 'admin'){
            $data['exam_list'] = Exam::where('category_id', $category_id)->get();
        }
        else {
            $data['exam_list'] = Exam::where('Added_by', auth('web')->user()->id)->where('category_id', $category_id)->get();
        }
        return view('category.show', $data);
    }

    public function delete(Request $request){
        $cate = Category::where('id', $request->cate_id);
        $cate->delete();
        return back()->with('success', 'تم حذف القسم بنجاح');
    }
}
