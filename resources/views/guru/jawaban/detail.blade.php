@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a>
        </div>

    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">

        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Soal</th>
                <th scope="col">Pilihan</th>
                <th scope="col">Status</th>
                <th scope="col">Skor</th>
            </tr>
        </thead>
        <?php $no = 0; ?>
        @foreach($data as $item)
        <tbody>
            <tr>
                <th scope="row"><?= $no = $no + 1 ?></th>
                <td>{{ $item->siswa->nama }}</td>
                <td>{!! $item->detailSoal->soal !!}</td>
                <td>{{ $item->pilihan }}</td>
                @if($item->benar == 1)
                <td><button class="btn btn-success">B</button></td>
                @elseif($item->salah == 1)
                <td><button class="btn btn-danger">S</button></td>
                @endif
                <td>{{ $item->score }}</td>
            </tr>

        </tbody>
        @endforeach

    </table>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection