@extends('layouts.authMaster')

@section('content')
    <div class="card card-account">
        <div class="card-header">
            <h4 class="text-center mb-4">اختر حساب</h4>                
        </div>
        <div class="card-body">
            <div class="choose">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('account.login', 'teacher') }}">
                            <div class="accountChoose">
                                <img src="{{ asset('assets/images/project_img/teacher.png') }}" alt="img"/>
                                <p class="h3">مدرس</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('account.login', 'student') }}">
                            <div class="accountChoose">
                                <img src="{{ asset('assets/images/project_img/student.png') }}" alt="img"/>
                                <p class="h3">طالب</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('account.login', 'admin') }}">
                            <div class="accountChoose">
                                <img src="{{ asset('assets/images/project_img/admin.png') }}" alt="img"/>
                                <p class="h4">مسؤول المنصة</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection