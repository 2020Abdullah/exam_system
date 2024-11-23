@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                اختبارات القسم
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">{{ $category->name }}</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="AllExam">
    <div class="page-header">
        <h3>اختبارات {{ $category->name }}</h3>
    </div>
    <div class="row">
        @forelse ($exam_list as $exam)
            <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                <div class="card">
                    <div class="card-image">
                        @if ($exam->image !== null)
                            <img src="{{ asset($exam->image) }}" alt="img">
                        @else 
                            <img src="{{ asset('assets/images/quiz.jpg') }}" alt="img">
                        @endif
                    </div>
                    <div class="card-body">
                        <h2>{{ $exam->title }}</h2>
                        <span class="mt-2">مدة الإختبار : {{ $exam->time }} دقيقة</span>
                        <p>تاريخ التوافر : {{ $exam->available_date }}</p>    
                        <p>الساعة : {{ \Carbon\Carbon::parse($exam->available_time)->format('h:i A')  }}</p>    
                    </div>
                    @if (auth('web')->check())
                        <div class="card-footer">
                            <a href="{{ route('user.exam.q.show', $exam->id) }}" class="btn btn-relief-info mb-1">عرض الأسئلة</a>
                            <a href="{{ route('user.exam.question.store', $exam->id) }}" class="btn btn-relief-success mb-1">إضافة أسئلة</a>
                            <a href="{{ route('user.exam.edit', $exam->id) }}" class="btn btn-relief-primary mb-1">تعديل</a>
                            <a href="{{ route('user.exam.reports', $exam->id) }}" class="btn btn-relief-danger  mb-1">تقارير الطلاب</a>
                        </div>
                    @else 
                        <div class="card-footer">
                            <a href="#" class="btn btn-relief-info d-block mb-1">دخول الإختبار</a>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3>لا توجد اى اختبارات تم إضافتها في هذا القسم</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection