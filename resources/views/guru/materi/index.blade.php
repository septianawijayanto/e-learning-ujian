@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a>
        </div>
        <div class="col text-right">
            <button type="button" class="btn btn-sm btn-flat btn-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <b><i class="fa fa-plus"></i> Tambah Materi</b>
            </button>
            <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                <a href="{{url('guru/materi/create?jenis=vidio')}}" style="color: black;" class="dropdown-item"> Link Youtube</a>
                <a href="{{url('guru/materi/create?jenis=file')}}" style="color: black;" class="dropdown-item"> Link File</a>
                <a href="{{url('guru/materi/create?jenis=teks')}}" style="color: black;" class="dropdown-item"> Link Teks</a>
            </div>
            <!-- <a href="#!" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data </a> -->
        </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis</th>
                <th scope="col">Isi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->jenis}}</td>
                <td>@if($dt->jenis=='file')
                    <a href="{{ \Storage::url($dt->isi) }}">Lihat File :{{$dt->judul}}</a>
                    @else
                    {!!$dt->isi!!}
                    @endif
                </td>
                <td>
                    <a href="{{url('guru/materi/'.$dt->id.'/edit/')}}" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i> Edit </a>
                    <a href="{{url('guru/materi/'.$dt->id.'/delete')}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i> Hapus </a>
                </td>
            </tr>
            @endforeach
        </tbody>
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