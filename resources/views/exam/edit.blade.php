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
                        <a href="#">{{ $exam->title }} تعديل</a>
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
        <h3>تعديل بيانات {{ $exam->title }}</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('user.exam.update') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $exam->id }}">
            <!-- preview image -->
            <div class="img_preview mb-2">
                @if ($exam->image == null)
                    <img id="previewImage" src="{{ asset('assets/images/quiz.jpg') }}" width="200" height="200" alt="img">
                @else 
                    <img id="previewImage" src="{{ asset($exam->image) }}" width="200" height="200" alt="img">
                @endif
                <div class="editPic">
                    <span>تعديل الصورة</span>
                    <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                </div>
            </div>
            <div class="mb-2">
                <label class="form-label">عنوان الإختبار</label>
                <input type="text" name="title" value="{{ $exam->title }}" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">مدة الإختبار بالدقيقة</label>
                <input type="number" name="time" value="{{ $exam->time }}" class="form-control" required>
            </div>

            <!-- حقل تحديد تاريخ التوافر -->
            <div class="mb-2">
                <label for="available_date">تاريخ التوافر:</label>
                <input type="text" id="fp-default" value="{{ $exam->available_date}}" class="form-control flatpickr-basic flatpickr-input" placeholder="YYYY-MM-DD" name="available_date" required>
            </div>

            <!-- حقل تحديد وقت التوافر -->
            <div class="mb-2">
                <label for="available_time">وقت التوافر:</label>
                <input type="time" class="form-control"  value="{{ $exam->available_time}}"  name="available_time" id="available_time" required>
            </div>

            <div class="mb-2">
                <label class="form-label">اختر القسم</label>
                <select class="form-select" name="category_id" required>
                    <option value="{{ $exam->category->id }}">{{ $exam->category->name }}</option>
                    @foreach ($cate_list as $cate)
                        @if ($exam->category->name !== $cate->name)
                            <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                        @endif
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
<script>
$(function(){
    // ربط حدث عند تغيير اختيار الصورة
    $('#imageInput').on('change', function(event) {
        const file = event.target.files[0];
        
        // التحقق من أن الملف هو صورة
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();

            reader.onload = function(e) {
                // تحديث عرض الصورة في المعاينة
                $('#previewImage').attr('src', e.target.result);
            };

            // قراءة الملف كـ Data URL لعرضه مباشرةً
            reader.readAsDataURL(file);
        } else {
            alert("يرجى اختيار صورة صحيحة.");
        }
    });
})
</script>
@endsection
