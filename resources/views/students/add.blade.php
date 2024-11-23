@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                صفحة إضافة الطلاب 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">إضافة طالب جديد</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3>بيانات الطالب</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('user.student.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label class="form-label">صورة الطالب (اختيارى)</label>
                <input type="file" name="profile_img" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label">اسم الطالب</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-2">
                <label class="form-label">رقم الجوال</label>
                <input type="text" class="form-control" name="phone" required>
            </div>

            <div class="mb-2">
                <label class="form-label">المدينة</label>
                <input type="text" class="form-control" name="city" id="city" required>
            </div>

            <div class="mb-2">
                <label class="form-label">اسم المدرسة</label>
                <input type="text" class="form-control" name="school_name" id="school_name" required>
            </div>

            <div class="mb-2">
                <label class="form-label">كلمة المرور</label>
                <input type="password" class="form-control" name="password" placeholder="******" id="password" required>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-success">حفظ البيانات</button>
            </div>
        </form>
    </div>
</div>
@endsection


