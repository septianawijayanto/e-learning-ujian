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
                <th scope="col">Guru</th>
                <th scope="col">Mapel</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal Bergabung</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->grup->kelas->kelas}}</td>
                <td>{{$dt->grup->guru->nama}}</td>
                <td>{{$dt->grup->mapel->mapel}}</td>
                <td>{{$dt->grup->deskripsi}}</td>
                <td>{{$dt->created_at}}</td>
                <td>
                    <a href="{{url('siswa/grup/detail/'.$dt->grup_id)}}" class="btn btn-success btn-sm btn-flat"><i class="far fa-eye"></i> Lihat Materi {{$dt->grupmateri->count()}} </a>
                    <a href="{{url('siswa/grup/materi/keluar/'.$dt->id)}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Anda yakin akan keluar Grup?')"> <i class="far fa-times-circle"></i> Keluar</a>
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