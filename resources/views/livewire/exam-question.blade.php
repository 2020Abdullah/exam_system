<div class="exam-question-layout">
    <div class="row">
        <!-- show message success finish quetions-->
        @if ($msg)
            <div class="col-12">
                <div class="alert alert-success">
                    <span class="alert-body">
                        {{ $msg }}
                    </span>
                </div>
            </div>
        @endif
        <div class="col-12">
            <!-- add questions -->
            <div class="card">
                <div class="card-header">
                    <h3>إضافة سؤال اختيار من متعدد</h3>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="form-label">عنوان السؤال</label>
                        <input type="text" class="form-control" wire:model="title">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">الإجابات المتاحة</label>
                        @foreach ($Allanswers as $index => $answer)
                            <div class="answer-field">
                                <input type="text" class="form-control" wire:model="Allanswers.{{ $index }}" placeholder="ادخل الإجابة">
                                <button class="btn btn-danger waves-effect waves-float waves-light" type="button" wire:click="removeAnswerField({{ $index }})">حذف</button>
                            </div>
                        @endforeach
                        <button class="btn btn-success mt-1 waves-effect waves-float waves-light" type="button" wire:click="addAnswerField">+</button>
                        @error('Allanswers.*') <div class="alert alert-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="mb-2">
                        <label class="form-label">اختر الإجابة الصحيحة</label>      
                        <input type="text" class="form-control" wire:model="right_answer" placeholder="اختر الإجابة الصحيحة">          
                    </div>
                    <div class="mb-2">
                        <label class="form-label">درجة السؤال</label>
                        <input type="text" wire:model="score" class="form-control">
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-success" wire:click.prevent="addQuestion">حفظ وإضافة سؤال آخر</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- show quetions -->
            <h3 class="mb-1 p-1">عرض الأسئلة</h3>
            <hr />
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>الترتيب</td>
                            <td>السؤال</td>
                            <td>الإجابات</td>
                            <td>الإجابة الصحيحة</td>
                            <td>الدرجة</td>
                            <td>إجراء</td>
                        </tr>
                        @foreach ($questions as $index => $q)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $q['title'] }}</td>
                                <td>{{ implode(', ', json_decode($q['answers'])) }}</td>
                                <td>{{ $q['right_answer'] }}</td>
                                <td>{{ $q['score'] }}</td>
                                <td>
                                    <button class="btn btn-relief-danger" wire:click="quetionDelete({{ $index }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            @if (count($questions) > 0)
                <button type="button" class="btn btn-relief-success" wire:click="saveQuetionsToDB">حفظ البيانات</button>
            @endif
        </div>
    </div>
</div>
