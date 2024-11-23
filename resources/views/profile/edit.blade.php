@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                 الملف الشخصي
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">تعديل الملف الشخصي</a>
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
        <h3>تعديل بياناتك</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <!-- preview image -->
            <div class="img_preview mb-2">
                @if ($user->profile_img == null)
                    <img id="previewImage" src="{{ asset('assets/images/user.png') }}" width="200" height="200" alt="img">
                @else 
                    <img id="previewImage" src="{{ asset($user->profile_img) }}" width="200" height="200" alt="img">
                @endif
                <div class="editPic">
                    <span>تعديل الصورة</span>
                    <input type="file" name="profile_img" class="form-control" accept="image/*" id="imageInput">
                </div>
            </div>

            <div class="mb-2">
                <label class="form-label">اسمك بالكامل</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
            </div>

            <div class="mb-2">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>

            <div class="mb-2">
                <label class="form-label">كلمة مرور جديدة</label>
                <input type="password" name="password" placeholder="******" class="form-control">
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-success">حفظ البيانات</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
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
