@extends('layouts.dashboard')

@section('css')
<style>
    .quetionCard {
        margin-bottom: 1rem;
    }
</style>
@endsection

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
                        <a href="#">عرض نتيجة الإختبار</a>
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>السؤال</th>
                            <th>إجابتك</th>
                            <th>الإجابة الصحيحة</th>
                            <th>الدرجة</th>
                        </tr>
                        @foreach ($FormResult as $res)
                            <tr class='{{ $res->is_correct === 1 ? "bg-success text-white" : " "}}'>
                                <td>{{ $res->question->title }}</td>
                                <td>{{ $res->selected_answer == null ? 'لا يوجد' : $res->selected_answer }}</td>
                                <td>{{ $res->question->right_answer }}</td>
                                <td>{{ $res->score }}</td>
                            </tr>
                        @endforeach
                        <tr class="text-center">
                            <td colspan="2">مجموع درجاتك : {{ $total_score == null ? 0 : $total_score }}</td>
                            <td colspan="2">
                                <span>نتيجتك :</span>
                                @if ($total_score >= $passingScore)
                                    <span class="text-success">ناجح</span>
                                @else 
                                    <span class="text-danger">راسب</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

