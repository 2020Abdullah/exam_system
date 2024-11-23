@extends('layouts.auth')

@section('content')
<div class="misc-wrapper">
    <div class="misc-inner p-2 p-sm-3">
        <div class="w-100 text-center">
            <h1 class="mb-1">{{ $title }}</h1>
            <p class="lead mb-1">{{ $NotAllowed }}</p>
            <div class="logout">
                <a class="btn btn-success waves-effect waves-float waves-light" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="me-50" data-feather="power"></i> 
                    تسجيل الخروج
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            <img class="img-fluid" src="{{ asset('assets/images/pages/not-authorized.svg') }}" alt="Not authorized page">
        </div>
    </div>
</div>
@endsection