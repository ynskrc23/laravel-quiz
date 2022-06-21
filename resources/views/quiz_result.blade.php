<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }} Sonucu
    </x-slot>

    <div class="card">
        <div class="card-body">
            <p class="card-text">
                <h4>Puanınız: {{ $quiz->my_result->point }}</h4>
                <div class="alert bg-light">
                    <i class="fa-solid fa-circle"></i> İşaretlediğin Cevap <br>
                    <i class="fa fa-check text-success"></i> Doğru Cevap <br>
                    <i class="fa-solid fa-xmark text-danger"></i> Yanlış Cevap
                </div>
                @foreach($quiz->questions as $question)
                    @if($question->correct_answer == $question->my_answer->answer)
                        <i class="fa fa-check text-success"></i>
                    @else
                        <i class="fa-solid fa-xmark text-danger"></i>
                    @endif

                    <strong>#{{ $loop->iteration }}</strong> {{ $question->question }}
                    @if($question->image)
                        <img src="{{asset($question->image)}}" style="width:50%" class="img-responsive">
                    @endif
                    <br>
                        <small>Bu soruya % <strong>{{ $question->true_percent }}</strong> oranında doğru cevap verildi. </small>

                    <div class="form-check mt-3">
                        @if('answer1' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer1' == $question->my_answer->answer)
                            <i class="fa-solid fa-circle"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if('answer2' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer2' == $question->my_answer->answer)
                            <i class="fa-solid fa-circle"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if('answer3' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer3' == $question->my_answer->answer)
                            <i class="fa-solid fa-circle"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        @if('answer4' == $question->correct_answer)
                            <i class="fa fa-check text-success"></i>
                        @elseif('answer4' == $question->my_answer->answer)
                            <i class="fa-solid fa-circle"></i>
                        @endif
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            {{ $question->answer4 }}
                        </label>
                    </div>
                    @if(!$loop->last)
                    <hr>
                    @endif
               @endforeach
            </p>
        </div>
    </div>
</x-app-layout>
