@extends('layouts.dashboard')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                بيانات الإختبار 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">إنشاء اختبار جديد</a>
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
        <h3>إنشاء اختبار جديد</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('user.exam.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label class="form-label">صورة للإختبار (اختيارى)</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-2">
                <label class="form-label">عنوان الإختبار</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">مدة الإختبار بالدقيقة</label>
                <input type="number" name="time" value="0" class="form-control" required>
            </div>
            <!-- حقل تحديد تاريخ التوافر -->
            <div class="mb-2">
                <label for="available_date">تاريخ التوافر:</label>
                <input type="text" id="fp-default" class="form-control flatpickr-basic flatpickr-input" placeholder="YYYY-MM-DD" name="available_date" required>
            </div>

            <!-- حقل تحديد وقت التوافر -->
            <div class="mb-2">
                <label for="available_time">وقت التوافر:</label>
                <input type="time" class="form-control" name="available_time" id="available_time" required>
            </div>

            <div class="mb-2">
                <label class="form-label">اختر القسم</label>
                <select class="form-select" name="category_id" required>
                    @foreach ($cate_list as $cate)
                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">حفظ البيانات</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
@endsection
