@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                 تقرير الطالب
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">{{ $student->name }}</a>
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
        <h3>تقارير الإختبارات التي أداها الطالب</h3>
    </div>
    <div class="card-body">
        <!-- preview image -->
        <div class="img_preview mb-2">
            @if ($student->profile_img == null)
                <img id="previewImage" src="{{ asset('assets/images/user.png') }}" width="200" height="200" alt="img">
            @else 
                <img id="previewImage" src="{{ asset($student->profile_img) }}" width="200" height="200" alt="img">
            @endif
        </div>

        <!-- show report table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>رقم الإختبار</td>
                    <td>الإختبار</td>
                    <td>الحالة</td>
                    <td>الدرجة الكلية</td>
                    <td>درجة الطالب</td>
                    <td>النتيجة</td>
                </tr>
                @forelse ($reports as $report)
                    @php
                        // حساب درجة النجاح المطلوبة (50% من الدرجة الكلية)
                        $passingScore = $report->exam->quetions->sum('score') * 0.5;
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $report->exam->title }}</td>
                        <td>{{ $report->is_completed === 1 ? 'مكتمل' : 'غير مكتمل' }}</td>
                        <td>{{ $report->exam->quetions->sum('score') }}</td>
                        <td>{{ $report->score }}</td>
                        <td>
                            @if ($report->score >= $passingScore)
                                <span class="text-success">ناجح</span>
                            @else 
                                <span class="text-danger">راسب</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6">لا يوجد اى اختبارات تمت بعد</td>
                    </tr>
                @endforelse
            </table>
        </div>
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
