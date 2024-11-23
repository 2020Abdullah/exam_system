@extends('layouts.auth')

@section('content')
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
        <!-- Login basic -->
        <div class="card mb-0">
            <div class="card-body">
                <x-application-logo></x-application-logo>
                <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                    @csrf
                    @if (Request::is('student/login'))
                        <input type="hidden" value="student" name="user">
                    @elseif(Request::is('teacher/login'))
                        <input type="hidden" value="teacher" name="user">
                    @else     
                        <input type="hidden" value="admin" name="user">
                    @endif
                    <div class="mb-1">
                        <label for="login-email" class="form-label">البريد الإلكتروني</label>
                        <input type="text" class="form-control" id="login-email" name="email" placeholder="AAAA@gmail.com" autofocus />
                    </div>
                    @error('email')
                        <div class="alert alert-danger">
                            <p>{{ @$message }}</p>
                        </div>
                    @enderror
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="login-password">كلمة السر</label>
                            <a href="#">
                                <small>هل نسيت كلمة السر ؟</small>
                            </a>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" name="password" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                        @error('email')
                            <div class="alert alert-danger">
                                <p>{{ @$message }}</p>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember-me" tabindex="3" />
                            <label class="form-check-label" for="remember-me">تذكرني</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100" tabindex="4">تسجيل الدخول</button>
                </form>

                <p class="text-center mt-2">
                    <span>هل ليس لديك حساب ؟</span>
                    @if (Request::is('student/login'))
                        <a href="{{ route('register') }}">
                            <span>إنشاء حساب</span>
                        </a>
                    @elseif(Request::is('teacher/login'))
                        <a href="{{ route('teacher.register') }}">
                            <span>إنشاء حساب</span>
                        </a>
                    @else     
                        <a href="{{ route('admin.register') }}">
                            <span>إنشاء حساب</span>
                        </a>
                    @endif
                
                </p>

            </div>
        </div>
        <!-- /Login basic -->
    </div>
</div>

@endsection


