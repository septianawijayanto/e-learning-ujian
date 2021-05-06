@extends('siswa.ujian.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col-8">
            <h3 class="mb-0">{{$title}}</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <td style="width: 220px">Nama Paket</td>
                            <td style="width: 15px">:</td>
                            <td>{{ $soal->paket }}</td>
                        </tr>
                        <tr>
                            <td style="width: 220px">Deskripsi</td>
                            <td style="width: 15px">:</td>
                            <td>{{ $soal->deskripsi }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Benar</td>
                            <td>:</td>
                            <td>{{ $pilgan_benar ? number_format($pilgan_benar->count()) : '0' }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Salah</td>
                            <td>:</td>
                            <td>{{ $pilgan_salah ? number_format($pilgan_salah->count()) : '0' }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Soal</td>
                            <td>:</td>
                            <td>{{ $jumlah_pilgan ? number_format($jumlah_pilgan) : '0' }}</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>{{ $soal->waktu.' menit' }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Nilai</td>
                            <td>:</td>
                            <td>{{ $jumlah_skor ? number_format($jumlah_skor) : '0' }}</td>
                        </tr>
                    </table>
                    <a href="{{route('siswa.ujian.index')}}" class="btn btn-danger col-12 mt-4">KEMBALI</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection