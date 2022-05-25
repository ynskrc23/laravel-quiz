<x-app-layout>
    <x-slot name="header">
        Quizler
    </x-slot>

   <div class="card">
       <div class="card-body">
           <h5 class="card-title">
               <a href="{{ route("quizzes.create") }}" class="btn btn-sm btn-primary">Quiz Ekle</a>
           </h5>
           <table class="table">
               <thead class="thead-light">
               <tr>
                   <th scope="col">Quiz</th>
                   <th scope="col">Durum</th>
                   <th scope="col">Bitiş Tarihi</th>
                   <th scope="col">İşlemler</th>
               </tr>
               </thead>
               <tbody>
               @foreach($quizzes as $val)
               <tr>
                   <td scope="row">{{ $val->title }}</td>
                   <td>{{ $val->status }}</td>
                   <td>{{ $val->finished_at }}</td>
                   <td>
                       <a href="" class="btn btn-sm btn-primary">Düzenle</a>
                       <a href="" class="btn btn-sm btn-danger">Sil</a>
                   </td>
               </tr>
               @endforeach
               </tbody>
           </table>
           {{ $quizzes->links() }}
       </div>
   </div>

</x-app-layout>
