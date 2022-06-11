<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }}
    </x-slot>

    <div class="card">
        <div class="card-body row">
            <div class="col-md-4">
                <ol class="list-group list-group-numbered">
                    @if($quiz->finished_at)
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Son Katılım Tarihi</div>
                        </div>
                        <span title="{{ $quiz->finished_at }}" class="badge bg-secondary rounded-pill">{{$quiz->finished_at->diffForHumans()}}</span>
                    </li>
                    @endif
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Soru Sayısı</div>
                        </div>
                        <span class="badge bg-secondary rounded-pill">{{$quiz->questions_count}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Katılımcı Sayısı</div>
                        </div>
                        <span class="badge bg-secondary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Ortalama Puan</div>
                        </div>
                        <span class="badge bg-secondary rounded-pill">14</span>
                    </li>
                </ol>
            </div>

            <div class="col-md-8">
                <h5 class="card-title">
                    <b> {{ $quiz->title }}</b>
                </h5>
                <p class="card-text">
                    {{ $quiz->description }}
                </p>
                <a href="#" class="btn btn-primary btn-block btn-sm">
                   Quize katıl
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
