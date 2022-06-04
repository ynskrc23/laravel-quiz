<x-app-layout>
    <x-slot name="header">
        {{ $quiz->title }} Quizine ait sorular
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="" class="btn btn-sm btn-primary">Question Ekle</a>
            </h5>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Soru</th>
                    <th scope="col">Resim</th>
                    <th scope="col">1. Cevap</th>
                    <th scope="col">2. Cevap</th>
                    <th scope="col">3. Cevap</th>
                    <th scope="col">4. Cevap</th>
                    <th scope="col">Doğru Cevap</th>
                    <th scope="col" style="width:150px;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quiz->questions as $val)
                    <tr>
                        <td scope="row">{{ $val->question }}</td>
                        <td>{{ $val->image }}</td>
                        <td>{{ $val->answer1 }}</td>
                        <td>{{ $val->answer2 }}</td>
                        <td>{{ $val->answer3 }}</td>
                        <td>{{ $val->answer4 }}</td>
                        <td>{{ substr($val->correct_answer,-1) }} Cevap</td>
                        <td>
                            <a href="" class="btn btn-sm btn-primary">Düzenle</a>
                            <a href="" class="btn btn-sm btn-danger">Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
