@extends('laporan.master')
@section('konten')

<table class="table align-items-center table-flush mytable">
    <thead class="thead-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Induk</th>
            <th scope="col">Nama</th>
            <!-- <th scope="col">Username</th> -->
            <th scope="col">Gender</th>
            <th scope="col">TTL</th>
            <th scope="col">Agama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Telepon</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $e=>$dt)
        <tr>
            <td>{{$e+1}}</td>
            <td>{{$dt->no_induk}}</td>
            <td>{{$dt->nama}}</td>
            <!-- <td>{{$dt->username}}</td> -->
            <td>{{$dt->jenkel}}</td>
            <td>{{$dt->tempat_lahir}}, {{$dt->tgl_lahir}}</td>
            <td>{{$dt->agama}}</td>
            <td>{{$dt->alamat}}</td>
            <td>{{$dt->no_telp}}</td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection