@extends('siswa.layouts.master')
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
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Pengirim </th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Judul</th>
                <th scope="col">Nama File</th>
                <th scope="col">Tanggal Posting</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->kelas->kelas}}</td>
                <td>{{$dt->guru->nama}}</td>
                <td>{{$dt->mapel->mapel}}</td>
                <td>{{$dt->judul}}</td>
                <td>{{$dt->jenis}}</td>
                <td>{{$dt->tgl_posting}}</td>
                <td>
                    <a href="{{url('siswa/materi/'.$dt->id.'/show/')}}" class="btn btn-success btn-sm btn-flat"><i class="far fa-eye"></i> Show </a>
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