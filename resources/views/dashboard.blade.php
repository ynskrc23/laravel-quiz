<x-app-layout>
    <x-slot name="header">
        Anasayfa
    </x-slot>

    <div class="row">
        <div class="col-md-8">
            @foreach($quizzes as $quiz)
            <div class="list-group">
                <a href="{{ route('quiz.detail',$quiz->slug) }}" class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><b>{{ $quiz->title }}</b></h5>
                        <small>{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans().' bitiyor' : null }}</small>
                    </div>
                    <p class="mb-1">{{ Str::limit($quiz->description,100) }}</p>
                    <small>{{ $quiz->questions_count }} Soru</small>
                </a>
            </div>
            @endforeach
            <div class="mt-3">
                {{ $quizzes->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-group">
                @foreach($results as $result)
                    <li class="list-group-item">
                        <storng>{{ $result->point }}</storng> -
                        <a href="{{ route('quiz.detail', $result->quiz->slug) }}">
                            {{ $result->quiz->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</x-app-layout>
