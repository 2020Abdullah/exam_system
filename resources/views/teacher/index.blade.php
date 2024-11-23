@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                المدرسين
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">صفحة المدرسين</a>
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
        <h3>المدرسين</h3>
        <button type="button" class="btn btn-outline-primary waves-effect" data-bs-toggle="modal" data-bs-target="#createModel">
            إضافة مدرس جديد
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>الترتيب</th>
                    <th>الإسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>حالة الحساب</th>
                    <th>الإجراءات</th>
                </tr>
                @forelse ($teacher_list as $teacher)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $teacher->name }}</td>
                        <td>{{ $teacher->email }}</td>
                        <td>{{ $teacher->status === 1 ? "مفعل" : "غير مفعل"}}</td>
                        <td>
                            <div class="d-none d-md-block">
                                <a class="btn btn-success editBtn" href="#" data-id="{{ $teacher->id }}" data-name="{{ $teacher->name }}" data-email="{{ $teacher->email }}" data-bs-toggle="modal" data-bs-target="#UpdateModel">تعديل</a>

                                @if ($teacher->status === 1)
                                    <a class="btn btn-danger delBtn" href="#" data-id="{{ $teacher->id }}" data-bs-toggle="modal" data-bs-target="#DelModel">تعطيل الحساب</a>
                                @else 
                                    <a href="{{ route('user.teacher.account.active', $teacher->id) }}" class="btn btn-success">تفعيل الحساب</a>
                                @endif
                            </div>
                            <div class="d-lg-none d-sm-block d-md-none">

                                <button type="button" class="btn btn-icon btn-outline-success waves-effect editBtn" data-id="{{ $teacher->id }}" data-name="{{ $teacher->name }}" data-email="{{ $teacher->email }}" data-bs-toggle="modal" data-bs-target="#UpdateModel">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <button type="button" class="btn btn-icon btn-outline-danger waves-effect delBtn" data-id="{{ $teacher->id }}" data-bs-toggle="modal" data-bs-target="#DelModel">
                                    <i class="fa fa-trash"></i>
                                </button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">لا توجد اى مدرسين تم إضافتهم حتي الآن</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
<!-- models crud -->
@include('teacher.models')
@endsection

@section('js')
<script>
    $(function(){

        // update action
        $('.editBtn').on('click', function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let email = $(this).data('email');
            $("#UpdateModel .id").val(id);
            $("#UpdateModel .name").val(name);
            $("#UpdateModel .email").val(email);
        })

        // delete action

        $('.delBtn').on('click', function(){
            let id = $(this).data('id');
            $("#DelModel .teacher_id").val(id);
        })
    })
</script>
@endsection
