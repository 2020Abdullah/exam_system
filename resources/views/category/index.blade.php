@extends('layouts.dashboard')

@section('page-title')
<div class="content-header-left col-md-12 mb-2">
    <div class="row breadcrumbs-top">
        <div class="col-md-10">
            <h2 class="content-header-title float-start mb-0">
                الأقسام المتاحة 
            </h2>
            <div class="breadcrumb-wrapper">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('user.dashboard') }}">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="#">صفحة العرض</a>
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
        <h3>الأقسام المتاحة للإختبارات</h3>
        <button type="button" class="btn btn-outline-primary waves-effect" data-bs-toggle="modal" data-bs-target="#createModel">
            إضافة قسم جديد
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>الترتيب</th>
                    <th>القسم</th>
                    <th>الإجراءات</th>
                </tr>
                @forelse ($category_list as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="d-none d-md-block">
                                <a class="btn btn-primary" href="{{ route('user.category.show', $category->id) }}">تفاصيل</a>
                                <a class="btn btn-success editBtn" href="#" data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-bs-toggle="modal" data-bs-target="#UpdateModel">تعديل</a>
                                <a class="btn btn-danger delBtn" href="#" data-id="{{ $category->id }}" data-bs-toggle="modal" data-bs-target="#DelModel">حذف</a>
                            </div>
                            <div class="d-lg-none d-sm-block d-md-none">
                                <a href="{{ route('user.category.show', $category->id) }}" class="btn btn-icon btn-outline-primary waves-effect">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-icon btn-outline-success waves-effect editBtn"  data-id="{{ $category->id }}" data-name="{{ $category->name }}" data-bs-toggle="modal" data-bs-target="#UpdateModel">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-outline-danger waves-effect delBtn" data-id="{{ $category->id }}" data-bs-toggle="modal" data-bs-target="#DelModel">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="3">لا توجد اى أقسام حتي الآن</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
<!-- models crud -->
@include('category.models')
@endsection

@section('js')
<script>
    $(function(){

        // update action
        $('.editBtn').on('click', function(){
            let id = $(this).data('id');
            let name = $(this).data('name');
            $("#UpdateModel .id").val(id);
            $("#UpdateModel .name").val(name);
        })

        // delete action

        $('.delBtn').on('click', function(){
            let id = $(this).data('id');
            $("#DelModel .cate_id").val(id);
        })
    })
</script>
@endsection
