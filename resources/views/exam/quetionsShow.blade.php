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
                عرض الأسئلة ({{ $exam->title }})
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">عرض الأسئلة</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    عدد الأسئلة ({{ $exam->quetions->count() }})
                </h3>
            </div>
            <div class="card-body">
                <div class="quetionShow">
                    @foreach ($exam->quetions as $q)
                        <div class="quetionCard">
                            <!-- quetion title -->
                            <h3>[{{ $loop->iteration }}] {{ $q->title }}</h3>

                            <!-- answers show -->
                            <ul class="list-group">
                                @foreach (json_decode($q->answers) as $answer)
                                    @if ($answer === $q->right_answer)
                                        <strong class="list-group-item list-group-item-action mt-2 active">✔ {{ $answer }}</strong>
                                    @else 
                                        <span class="list-group-item list-group-item-action">{{ $answer }}</span>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

