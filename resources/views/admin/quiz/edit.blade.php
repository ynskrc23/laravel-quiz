<x-app-layout>
    <x-slot name="header">
        Ouiz Güncelleme Ekranı
    </x-slot>

    <x-slot name="listeleme">
        <a href="{{ route('quizzes.index') }}" class="font-semibold text-xl text-gray-800 leading-tight" style="float:right;">Listeleme</a>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('quizzes.update',$quiz->id)}}">
                @method('PUT')
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Başlık</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}">
                </div>

                <div class="form-group mb-3">
                    <label for="description">Açıklama</label>
                    <textarea name="description" class="form-control" rows="5">{{ $quiz->description }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <input id="isFinished" @if( $quiz->finished_at) checked @endif type="checkbox">
                    <label for="isFinished">Bitiş Tarihi Olacak mı?</label>
                </div>

                <div class="form-group mb-3" @if(!$quiz->finished_at) style="display:none;" @endif id="isFinishedInput">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Güncelle</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="js">
        <script type="text/javascript">
            $('#isFinished').change(function() {
                if($('#isFinished').is(':checked')) {
                    $('#isFinishedInput').show();
                }
                else{
                    $('#isFinishedInput').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>
<?php
