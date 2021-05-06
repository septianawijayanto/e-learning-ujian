@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{url('guru/grup/'.$data->grup_id.'/detail')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            Judul :{{strtoupper($data->judul)}}
            <br>
            Nama Materi :{{strtoupper($data->materi->judul)}}
            @if($data->materi->jenis=='file')
            <a href="{{ \Storage::url($data->materi->isi) }}">Lihat File :{{$data->materi->judul}}</a>
            @else
            <div>{!!$data->materi->isi!!}</div>
            @endif
        </div>
    </div>
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