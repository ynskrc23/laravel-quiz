<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }}
    </x-slot>

    <div class="card">
        <div class="card-body row">
            <div class="col-md-4">
                <ol class="list-group list-group-numbered">
                    @if($quiz->my_result)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Puan</div>
                            </div>
                            <span class="badge bg-primary rounded-pill">
                                {{ $quiz->my_result->point }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Doğru / Yanlış Sayısı</div>
                            </div>
                            <div class="float-right">
                                <span class="badge bg-success rounded-pill">
                                    {{ $quiz->my_result->correct }} Doğru
                                </span>
                                <span class="badge bg-danger rounded-pill">
                                    {{ $quiz->my_result->wrong }} Yanlış
                                </span>
                            </div>

                        </li>
                    @endif
                    @if($quiz->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Son Katılım Tarihi</div>
                            </div>
                            <span title="{{ $quiz->finished_at }}" class="badge bg-secondary rounded-pill">
                                {{ $quiz->finished_at->diffForHumans() }}
                            </span>
                        </li>
                    @endif
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Soru Sayısı</div>
                        </div>
                        <span class="badge bg-info rounded-pill">
                            {{ $quiz->questions_count }}
                        </span>
                    </li>
                    @if($quiz->details)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Katılımcı Sayısı</div>
                            </div>
                            <span class="badge bg-warning rounded-pill">
                                {{ $quiz->details['join_count'] }}
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Ortalama Puan</div>
                            </div>
                            <b>{{ $quiz->details['average'] }}</b>
                        </li>
                    @endif
                </ol>

                @if(count($quiz->topTen) > 0)
                    <h5 class="card-title mt-4">İlk 10 Listesi</h5>
                    <ol class="list-group list-group-numbered">
                        @foreach($quiz->topTen as $result)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto fw-bold">
                                    {{ $result->user->name }}
                                </div>
                                <span class="badge bg-success rounded-pill">
                                    {{ $result->point }}
                                </span>
                            </li>
                        @endforeach
                    </ol>
                @endif
            </div>

            <div class="col-md-8">
                <h5 class="card-title">
                    <b> {{ $quiz->title }}</b>
                </h5>
                <p class="card-text">
                    {{ $quiz->description }}
                </p>
                @if($quiz->my_result)
                <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-warning btn-block btn-sm">
                   Quize görüntüle
                </a>
                @else
                    <a href="{{ route('quiz.join',$quiz->slug) }}" class="btn btn-primary btn-block btn-sm">
                        Quize katıl
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
