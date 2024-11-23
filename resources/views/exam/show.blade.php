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
                        <a href="#">عرض الإختبار</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    @livewire('exam-show', ['exam' => $exam, 'formExam' => $formExam], key($exam->id))
@endsection

