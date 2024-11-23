<!-- create model -->
<div class="modal fade text-start modal-primary" id="createModel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">مدرس جديد</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('user.teacher.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-1">
                        <label class="form-label">اسم المدرس</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">كلمة المرور</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-float waves-light">حفظ البيانات</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- update model -->
<div class="modal fade text-start modal-primary" id="UpdateModel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">تعديل بيانات المدرس</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('user.teacher.update') }}">
                @csrf
                <input type="hidden" class="id" name="teacher_id">
                <div class="modal-body">
                    <div class="mb-1">
                        <label class="form-label">اسم المدرس</label>
                        <input type="text" class="form-control name" name="name" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input type="text" class="form-control email" name="email" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">كلمة مرور جديدة</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-float waves-light">حفظ البيانات</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete model -->
<div class="modal fade text-start modal-danger" id="DelModel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel160">تنبيه !</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('user.teacher.delete') }}">
                @csrf
                <div class="modal-body">
                        <input type="hidden" class="teacher_id" name="teacher_id">
                    <p>هل تريد بالفعل تعطيل حساب المدرس ؟</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect waves-float waves-light">تأكيد</button>
                </div>
            </form>
        </div>
    </div>
</div>