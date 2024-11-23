@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                أسئلة الإختبار ({{ $exam->title }})
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">إضافة أسئلة الإختبار</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
    @livewire('exam-question', ['exam' => $exam], key($exam->id))
@endsection


@section('js')
<script>
    // استقبال حدث السؤال المحفوظ
    window.addEventListener('question-saved', () => {
        // عرض رسالة النجاح
        alert('تم إضافة البيانات بنجاح! سيتم تحويلك خلال 3 ثوانٍ.');

        // إعادة التوجيه بعد 5 ثوانٍ
        setTimeout(() => {
            window.location.href = '/user/dashboard'; // استبدل '/new-page' بالمسار الذي ترغب في التحويل إليه
        }, 3000);
    });
</script>
@endsection