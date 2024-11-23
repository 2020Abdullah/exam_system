@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                {{ $exam->title }}
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">تقارير الطلاب الذين قاموا بأداء الإختبار</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>تقرير الطلاب</h3>
                <a href="{{ route('user.exam.reports.export', $exam->id) }}" class="btn btn-outline-info waves-effect">
                    تصدير اكسيل
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>اسم الطالب</th>
                            <th>الدرجة الكلية</th>
                            <th>درجة الطالب</th>
                            <th>نتيجة الطالب</th>
                        </tr>
                        @forelse($examReports as $report)
                            @php
                                // حساب درجة النجاح المطلوبة (50% من الدرجة الكلية)
                                $passingScore = $exam->quetions->sum('score') * 0.5;
                            @endphp
                            <tr>
                                <td>{{ $report->student->name }}</td>
                                <td>{{ $exam->quetions->sum('score') }}</td>
                                <td>{{ $report->score }}</td>
                                <td>
                                    @if ($report->score >= $passingScore)
                                        <span class="text-success">ناجح</span>
                                    @else 
                                        <span class="text-danger">راسب</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td colspan="4">لا يوجد اى طلاب قاموا بأداء الإختبار حتي الآن</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

