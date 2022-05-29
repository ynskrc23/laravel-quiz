<x-app-layout>
    <x-slot name="header">
        Ouiz Oluşturma Ekranı
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('quizzes.store')}}">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Başlık</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Açıklama</label>
                   <textarea name="description" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group mb-3">
                    <input id="isFinished" type="checkbox">
                    <label for="isFinished">Bitiş Tarihi Olacak mı?</label>
                </div>

                <div class="form-group mb-3" style="display:none;" id="isFinishedInput">
                    <label>Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" class="form-control">
                </div>

                <div class="form-group">
                   <button type="submit" class="btn btn-success btn-sm">Oluştur</button>
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