<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }} için yeni soru Oluşturma Ekranı
    </x-slot>

    <x-slot name="listeleme">
        <a href="{{ route('questions.index',$quiz->id) }}" class="font-semibold text-xl text-gray-800 leading-tight" style="float:right;">Listeleme</a>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('questions.store',$quiz->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="question">Soru</label>
                    <textarea name="question" class="form-control" rows="5">{{ old('question') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image">Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="answer1">1.Cevap</label>
                            <textarea name="answer1" class="form-control" rows="2">{{ old('answer1') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="answer2">2.Cevap</label>
                            <textarea name="answer2" class="form-control" rows="2">{{ old('answer2') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="answer3">3.Cevap</label>
                            <textarea name="answer3" class="form-control" rows="2">{{ old('answer3') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="answer4">4.Cevap</label>
                            <textarea name="answer4" class="form-control" rows="2">{{ old('answer4') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="answer4">Doğru Cevap</label>
                    <select name="correct_answer">
                        <option @if(old('correct_answer') === 'answer1') selected @endif value="answer1">1. Cevap</option>
                        <option @if(old('correct_answer') === 'answer2') selected @endif value="answer2">2. Cevap</option>
                        <option @if(old('correct_answer') === 'answer3') selected @endif value="answer3">3. Cevap</option>
                        <option @if(old('correct_answer') === 'answer4') selected @endif value="answer4">4. Cevap</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">Oluştur</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<?php
