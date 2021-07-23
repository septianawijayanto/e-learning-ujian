@extends('laporan.master')
@section('konten')
<table class="table align-items-center table-flush mytable">
    <thead class="thead-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas </th>
            <th scope="col">Mata Pelajaran</th>
            <th scope="col">Jenis</th>
            <th scope="col">Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $e=>$dt)
        <tr>
            <td>{{$e+1}}</td>
            <td>{{$dt->siswa->nama}}</td>
            <td>{{$dt->kelas->kelas}}</td>
            <td>{{$dt->mapel->mapel}}</td>
            <td>{{$dt->jenis}}</td>
            <td>{{$dt->nilai}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection