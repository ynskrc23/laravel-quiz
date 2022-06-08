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
                   <th scope="col">Soru Sayısı</th>
                   <th scope="col">Durum</th>
                   <th scope="col">Bitiş Tarihi</th>
                   <th scope="col">İşlemler</th>
               </tr>
               </thead>
               <tbody>
               @foreach($quizzes as $val)
               <tr>
                   <td scope="row">{{ $val->title }}</td>
                   <td>{{ $val->questions_count }}</td>
                   <td>
                       @switch($val->status)
                            @case('publish')
                                <span class="badge bg-success">Aktif</span>
                            @break
                            @case('passive')
                                <span class="badge bg-danger">Pasif</span>
                            @break
                            @case('draft')
                                <span class="badge bg-warning">Taslak</span>
                            @break
                       @endswitch
                   </td>
                   <td>
                        <span title="{{ $val->finished_at }}">
                            {{ $val->finished_at ? $val->finished_at->diffForHumans() : '-' }}
                        </span>
                   </td>
                   <td>
                       <a href="{{ route('questions.index',$val->id) }}" class="btn btn-sm btn-secondary">Sorular</a>
                       <a href="{{ route('quizzes.edit',$val->id) }}" class="btn btn-sm btn-primary">Düzenle</a>
                       <a href="{{ route('quizzes.destroy',$val->id) }}" class="btn btn-sm btn-danger">Sil</a>
                   </td>
               </tr>
               @endforeach
               </tbody>
           </table>
           {{ $quizzes->links() }}
       </div>
   </div>

</x-app-layout>
