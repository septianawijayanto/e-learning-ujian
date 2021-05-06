@extends('siswa.ujian.layouts.master')
@section('konten')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.css" integrity="sha512-lZ3AwSh5B+1EgCuXvjkdhFX8xU4dMDO8SPqAn71VFY4luNN8gwKpajLxaZRMSeNMghUghfodtkZAWO2rM7H6Qw==" crossorigin="anonymous" />
<div class="container container-bread">
    <div class="row bg-white shadow bread-crumb">

    </div>

    <h4> Detail Jawaban </h4>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <center>

                        <i class="fa fa-smile-o" aria-hidden="true" style="font-size: 50pt; color: #18b10f;"></i>
                        <p style="color: #848383; font-size: 14pt; margin: 0">Selamat, kamu telah berhasil menyelesaikan ujian <b>{{ $soal->paket }}</b></p>
                        <p style="color: #848383; font-size: 14pt; margin: 0">
                            @if($nilai->sum('score') != 0)
                            Nilai kamu <b>{{$nilai->sum('score')}}</b>
                            @else
                            Nilai kamu sudah keluar, tapi rahasia dulu ya. Dan jangan lupa selalu belajar dengan giat ya!
                            @endif

                        </p>
                    </center>
                    <a href="{{route('siswa.ujian.index')}}" class="btn btn-danger col-12 mt-4">KEMBALI</a>
                </div>
            </div>


        </div>

    </div>
</div>



</div>
@endsection