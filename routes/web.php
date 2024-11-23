<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLessonController;
use App\Http\Controllers\CoursePlayListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\LessonExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// student routes

Route::group(['prefix' => 'student', 'middleware' => ['auth:student', 'checkActive']], function(){
    Route::get('dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');
    Route::get('section/{category_id}/view', [CategoryController::class, 'show'])->name('category.show');

    // exam show 
    Route::get('exam/{id}/view', [ExamController::class, 'showExam'])->name('exam.show');
    Route::get('exam/{id}/result', [ExamController::class, 'showExamResult'])->name('exam.result');
});

// admin & teacher routes 

Route::group(['prefix' => 'user', 'as' => 'user.'],function(){
    Route::group(['middleware' => ['auth:web', 'verified']], function(){
        Route::get('dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

        // category Exam
        Route::get('section/view', [CategoryController::class, 'index'])->name('category.index');
        Route::post('section/store', [CategoryController::class, 'store'])->name('category.store');
        Route::post('section/update', [CategoryController::class, 'update'])->name('category.update');
        Route::post('section/delete', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('section/{category_id}/view', [CategoryController::class, 'show'])->name('category.show');

        // Exam crud
        Route::get('exam/create', [ExamController::class, 'createExam'])->name('exam.create');
        Route::post('exam/store', [ExamController::class, 'storeExam'])->name('exam.store');
        Route::get('exam/{id}/edit', [ExamController::class, 'editExam'])->name('exam.edit');
        Route::post('exam/update', [ExamController::class, 'updateExam'])->name('exam.update');
        Route::get('exam/{id}/quetions/view', [ExamController::class, 'quetionsView'])->name('exam.q.show');
        Route::get('exam/{id}/reports', [ExamController::class, 'showExamReports'])->name('exam.reports');
        Route::get('exam/{exam_id}/report/export', [ExamController::class, 'reportExport'])->name('exam.reports.export');

        // exam store question
        Route::get('exam/{exam_id}/questions', [ExamController::class, 'questionCreate'])->name('exam.question.store');
    
        // teacher crud 
        Route::get('teacher/view', [TeacherController::class, 'index'])->name('teacher.index');
        Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
        Route::post('teacher/update', [TeacherController::class, 'update'])->name('teacher.update');
        Route::post('teacher/deactive', [TeacherController::class, 'delete'])->name('teacher.delete');
        Route::get('teacher/{id}/active', [TeacherController::class, 'accountActive'])->name('teacher.account.active');

        // students crud
        Route::get('student/list', [StudentController::class, 'index'])->name('student.index');
        Route::get('student/add', [StudentController::class, 'create'])->name('student.add');
        Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
        Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('student/update', [StudentController::class, 'update'])->name('student.update');
        Route::post('student/deactive', [StudentController::class, 'deactiveAccount'])->name('student.delete');
        Route::get('student/{id}/active', [StudentController::class, 'activeAccount'])->name('student.account.active');
        Route::get('student/{id}/report/view', [StudentController::class, 'showReportExam'])->name('student.report.view');
    
    });
});

Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

require __DIR__.'/auth.php';
