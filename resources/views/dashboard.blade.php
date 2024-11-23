@extends('layouts.dashboard')

@section('content')
<!-- dashboard -->
<div class="row">
    @if (auth('web')->check())
        <div class="col">
            <a href="{{ route('user.category.index') }}">
                <div class="card">
                    <div class="card-header">
                        <h3>الأقسام</h3>
                    </div>
                    <div class="card-body text-center">
                        <p class="h3">{{ $categoryCount }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endif
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3>الإختبارات</h3>
            </div>
            <div class="card-body text-center">
                <p class="h3">{{ $examCount }}</p>
            </div>
        </div>
    </div>
</div>

<!-- show exams -->
<div class="AllExam">
    <div class="page-header">
        <h3>الإختبارات المتاحة</h3>
        @if (auth('web')->check())
            <a class="btn btn-success" href="{{ route('user.exam.create') }}">إنشاء اختبار جديد</a>
        @endif
    </div>
    <div class="row">
        @forelse ($exam_list as $exam)
            <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                <div class="card">
                    <div class="card-image">
                        @if (auth('web')->check())
                            @if ($exam->image !== null)
                                <img src="{{ asset($exam->image) }}" alt="img">
                            @else 
                                <img src="{{ asset('assets/images/quiz.jpg') }}" alt="img">
                            @endif
                        @else 
                            @if ($exam->image !== null)
                                <img src="{{ asset($exam->image) }}" alt="img">
                            @else 
                                <img src="{{ asset('assets/images/quiz.jpg') }}" alt="img">
                            @endif
                        @endif
                    </div>
                    <div class="card-body">
                        @if (auth('web')->check())
                            <h2>{{ $exam->title }}</h2>
                            <span class="mt-2">مدة الإختبار : {{ $exam->time }} دقيقة</span>
                            <p>تاريخ التوافر : {{ $exam->available_date }}</p>    
                            <p>الساعة : {{ \Carbon\Carbon::parse($exam->available_time)->format('h:i A')  }}</p>    
                            <p class="mt-2">القسم : <a href="{{ route('user.category.show', $exam->category->id) }}" class="badge badge-glow bg-success">{{ $exam->category->name }}</a></p>
                        @else 
                            <h2>{{ $exam->title }}</h2>
                            <span class="mt-2">مدة الإختبار : {{ $exam->time }} دقيقة</span>
                            <p>تاريخ التوافر : {{ $exam->available_date }}</p>    
                            <p>الساعة : {{ \Carbon\Carbon::parse($exam->available_time)->format('h:i A')  }}</p>    
                            <p class="mt-2">القسم : <a href="{{ route('category.show', $exam->category->id) }}" class="badge badge-glow bg-success">{{ $exam->category->name }}</a></p>   
                        @endif

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
                            @php
                                $examDateTime = Carbon\Carbon::parse($exam->available_date . ' ' . $exam->available_time);
                                $currentDateTime = \Carbon\Carbon::now();
                            @endphp
                            @if ($currentDateTime >= $examDateTime)
                                @if ($exam->attempt)
                                    @if ($exam->attempt->student_id == auth('student')->user()->id && $exam->attempt->is_completed == 1)
                                        <a href="{{ route('exam.result', $exam->id) }}" class="btn btn-relief-info d-block mb-1">عرض النتيجة</a>
                                    @else 
                                        <a href="{{ route('exam.show', $exam->id) }}" class="btn btn-relief-info d-block mb-1">دخول الإختبار</a>
                                    @endif
                                @else 
                                    <a href="{{ route('exam.show', $exam->id) }}" class="btn btn-relief-info d-block mb-1">دخول الإختبار</a>
                                @endif
                            @else 
                                <span class="badge badge-glow bg-primary text-wrap text-center">
                                    سيتم فتح الإختبار يوم {{ $exam->available_date }} 
                                    في تمام الساعة {{ \Carbon\Carbon::parse($exam->available_time)->format('h:i A')  }}
                                </span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3>لا توجد اى اختبارات تم إضافتها بعد</h3>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
