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
                <th scope="col">Judul</th>
                <th scope="col">Kelas</th>
                <th scope="col">Guru</th>
                <th scope="col">Mapel</th>
                <th scope="col">Batas Waktu</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($cek>=1)
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td> {{$dt->judul}} </td>
                <td> {{$dt->kelas->kelas}} </td>
                <td>{{$dt->guru->nama}}</td>
                <td> {{$dt->grup->mapel->mapel}} </td>
                <td>{{$dt->batas_waktu}}</td>
                <td>{{$dt->deskripsi}}</td>
                <td>
                    <!-- <a href="{{url('guru/tugas/'.$dt->id.'/edit')}}" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i> Edit </a> -->
                    <a href="{{url('siswa/tugas/'.$dt->id.'/detail')}}" class="btn btn-success btn-sm btn-flat"><i class="far fa-eye"></i> Detail </a>

                    @if($dt->jenis=='vidio')
                    <a href="{{url('siswa/tugas/'.$dt->id.'/kerjakan?jenis=vidio')}}" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-pencil-alt"></i> Kerjakan </a>
                    @elseif($dt->jenis=='file')
                    <a href="{{url('siswa/tugas/'.$dt->id.'/kerjakan?jenis=file')}}" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-pencil-alt"></i> Kerjakan </a>
                    @else
                    <a href="{{url('siswa/tugas/'.$dt->id.'/kerjakan?jenis=teks')}}" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-pencil-alt"></i> Kerjakan </a>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
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