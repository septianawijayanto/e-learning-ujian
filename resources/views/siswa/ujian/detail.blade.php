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
                            <td>Jumlah Soal Pilihan Ganda</td>
                            <td>:</td>
                            <td>{{ $soals ? number_format($soals) : '0' }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Soal Essay</td>
                            <td>:</td>
                            <td>{{ $essay ? number_format($essay) : '0' }}</td>
                        </tr>
                        <tr>
                            <td>Jenis</td>
                            <td>:</td>
                            @if($soal->jenis == "Ujian")
                            <td><span class="badge badge-success">Ujian</span></td>
                            @else
                            <td><span class="badge badge-primary">Latihan</span></td>
                            @endif
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>{{ $soal->waktu.' menit' }}</td>
                        </tr>
                    </table>
                    <a href="{{url('siswa/ujian/mulai/'.$soal->id)}}" class="btn btn-success col-12 mt-4">MULAI UJIAN</a>
                </div>
            </div>
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