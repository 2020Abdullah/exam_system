@extends('layouts.auth')

@section('content')
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="auth-wrapper auth-basic px-2">
    <div class="auth-inner my-2">
        <!-- register basic -->
        <div class="card mb-0">
            <div class="card-body">
                <x-application-logo></x-application-logo>
                <form class="auth-login-form mt-2" action="{{ route('register') }}" method="POST">
                    @csrf
                    @if (Request::is('student/register'))
                        <input type="hidden" value="student" name="user">
                    @elseif(Request::is('teacher/register'))     
                        <input type="hidden" value="teacher" name="user">
                    @else 
                        <input type="hidden" value="admin" name="user">
                    @endif
                    @if (Request::is('student/register'))
                        <div class="mb-1">
                            <label for="student-name" class="form-label">اسم الطالب</label>
                            <input type="text" class="form-control" id="student-name" name="name" autofocus />
                        </div>
                        @error('name')
                            <div class="alert alert-danger">
                                <p>{{ @$message }}</p>
                            </div>
                        @enderror
                        <div class="mb-1">
                            <label for="school-name" class="form-label">اسم المدرسة</label>
                            <input type="text" class="form-control" id="school-name" name="school_name" autofocus />
                        </div>
                        
                        @error('school_name')
                            <div class="alert alert-danger">
                                <p>{{ @$message }}</p>
                            </div>
                        @enderror
    
                        <div class="mb-1">
                            <label for="city" class="form-label">المدينة</label>
                            <input type="text" class="form-control" id="city" name="city" />
                        </div>
    
                        @error('city')
                            <div class="alert alert-danger">
                                <p>{{ @$message }}</p>
                            </div>
                        @enderror
                        <div class="mb-1">
                            <label for="phone" class="form-label">رقم الجوال</label>
                            <input type="text" class="form-control" id="phone" name="phone" />
                        </div>
    
                        @error('phone')
                            <div class="alert alert-danger">
                                <p>{{ @$message }}</p>
                            </div>
                        @enderror

                    @else 
                        <div class="mb-1">
                            <label for="student-name" class="form-label">اسمك بالكامل</label>
                            <input type="text" class="form-control" id="student-name" name="name" autofocus />
                        </div>
                        @error('name')
                            <div class="alert alert-danger">
                                <p>{{ @$message }}</p>
                            </div>
                        @enderror
                    
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
                        <label class="form-label" for="login-password"> كلمة السر</label>
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
                        <label class="form-label" for="login-password">تأكيد كلمة السر</label>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input type="password" name="password_confirmation" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success w-100" tabindex="4">إنشاء حساب</button>
                </form>

                <p class="text-center mt-2">
                    <span>هل  لديك حساب ؟</span>
                    @if (Request::is('student/register'))
                        <a href="{{ route('login') }}">
                            <span> تسجيل الدخول</span>
                        </a>
                    @elseif(Request::is('teacher/register'))
                        <a href="{{ route('teacher.login') }}">
                            <span> تسجيل الدخول</span>
                        </a>
                    @else     
                        <a href="{{ route('admin.login') }}">
                            <span> تسجيل الدخول</span>
                        </a>
                    @endif
                  
                </p>

            </div>
        </div>
        <!-- /register basic -->
    </div>
</div>
@endsection



