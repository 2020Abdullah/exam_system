@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                الطلاب 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">بيانات الطلاب</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header justify-content-between">
        <h3>كل الطلاب</h3>
        <a href="{{ route('user.student.add') }}" class="btn btn-outline-primary waves-effect">
            إضافة طالب جديد
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>صورة</th>
                    <th>اسم الطالب</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الجوال</th>
                    <th>المدينة</th>
                    <th>اسم المدرسة</th>
                    <th>حالة الحساب</th>
                    <th>الإجراءات</th>
                </tr>
                @forelse ($student_list as $student)
                    <tr>
                        <td>
                            @if ($student->profile_img == null)
                                <img src="{{ asset("assets/images/NoImage.png") }}" width="80" height="80" alt="img">
                            @else
                                <img src="{{ asset($student->profile_img) }}" width="80" height="80" alt="img">
                            @endif
                        </td>
                        <td>
                            <a class="text-primary" href="{{ route('user.student.report.view', $student->id) }}">
                                {{ $student->name }}
                            </a>
                        </td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->city }}</td>
                        <td>{{ $student->school_name }}</td>
                        <td>{{ $student->is_active === 1 ? "مفعل" : "غير مفعل" }}</td>
                        <td class="d-flex">
                            <a href="{{ route('user.student.edit', $student->id) }}" class="btn btn-icon btn-outline-success waves-effect me-1">
                                <i class="fa fa-edit"></i>
                            </a>
                            @if ($student->is_active === 1)
                                <button type="button" class="btn btn-icon btn-outline-danger waves-effect delBtn" data-id="{{ $student->id }}" data-bs-toggle="modal" data-bs-target="#DelModel">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @else
                                <a class="btn btn-flat-success waves-effect" href="{{ route('user.student.account.active', $student->id) }}">
                                    تفعيل الحساب
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="7">لا يوجد اى طلاب مسجلة حتي الآن</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
<!-- models crud -->
@include('students.Mdel')
@endsection

@section('js')
<script>
    $(function(){

        // delete action
        $('.delBtn').on('click', function(){
            let id = $(this).data('id');
            $("#DelModel .student_id").val(id);
        })
    })
</script>
@endsection
