<div class="exam_form_show" wire:poll.1000ms="decrementTimer">
    <div class="row">
        <!-- show time exam -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body text-center">
                    <p>الوقت المتبقي</p>
                    <h3 id="timer">{{ gmdate("i:s", $timeRemaining) }}</h3>
                </div>
            </div>
        </div>

        <!-- show quetions exam -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ $exam->title }} (عدد الأسئلة {{ $exam->quetions->count() }})
                </div>
                <div class="card-body">
                    <!-- عرض الأسئلة كاختيارات متعددة -->
                    <form wire:submit.prevent="submitExam">
                        @foreach($exam->quetions as $q)
                            <div class="mb-3">
                                <h3>[{{ $loop->iteration }}] {{ $q->title }}</h3>
                                <hr/>
                                @foreach(json_decode($q->answers) as $answer)
                                    <div class="form-check form-check-success mb-1">
                                        <input type="radio" class="form-check-input" wire:model.defer="answers.{{ $q->id }}" value="{{ $answer }}">
                                        <label>{{ $answer }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        <hr/>
                        <button type="submit" class="btn btn-relief-success">إرسال الإجابات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
