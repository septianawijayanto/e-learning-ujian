@extends('siswa.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card-body">
            <div class="row">
                @if($cek>=1)
                @if($data->count())
                @foreach($data as $dt)
                <?php
                $cek = App\Models\Model\NilaiPilgan::where('ujian_id', $dt->ujian_id)->where('siswa_id', Illuminate\Support\Facades\Session::get('id'))->where('status', 1)->first();
                $cek2 = App\Models\Model\NilaiEssay::where('ujian_id', $dt->ujian_id)->where('siswa_id', Illuminate\Support\Facades\Session::get('id'))->where('status', 1)->first();
                ?>

                @if($cek)
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ $dt->nama_paket }}</h5>
                                    @if($dt->jenis_paket=="Ujian")
                                    <h5 class="h2 font-weight-bold mb-0">Soal Ujian</h5>
                                    @else
                                    <h5 class="h2 font-weight-bold mb-0">Soal Latihan</h5>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-laptop"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap">{{$dt->deskripsi}}</span>
                            </p>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap badge badge-success">Kamu Sudah Mengerjakan Ujian Ini.</span>
                            </p>
                            <hr>
                            <a href="{{url('/siswa/ujian/'.$dt->ujian_id.'/finish-pilgan')}}" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-pencil-alt"></i> Kerjakan</a>
                        </div>
                    </div>
                </div>
                @elseif($cek2)
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ $dt->nama_paket }}</h5>
                                    @if($dt->jenis_paket=="Ujian")
                                    <h5 class="h2 font-weight-bold mb-0">Soal Ujian</h5>
                                    @else
                                    <h5 class="h2 font-weight-bold mb-0">Soal Latihan</h5>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-laptop"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap">{{$dt->deskripsi}}</span>
                            </p>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap badge badge-success">Kamu Sudah Mengerjakan Ujian Ini.</span>
                            </p>
                            <hr>
                            <a href="{{url('/siswa/ujian/'.$dt->ujian_id.'/detail/ujian')}}" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-pencil-alt"></i> Kerjakan</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-4 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ $dt->nama_paket }}</h5>
                                    @if($dt->jenis_paket=="Ujian")
                                    <h5 class="h2 font-weight-bold mb-0">Soal Ujian</h5>
                                    @else
                                    <h5 class="h2 font-weight-bold mb-0">Soal Latihan</h5>
                                    @endif
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-laptop"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-nowrap">{{$dt->deskripsi}}</span>
                            </p>
                            <hr>
                            <a href="{{url('/siswa/ujian/'.$dt->ujian_id.'/detail/ujian')}}" class="btn btn-primary btn-flat btn-sm"><i class="fas fa-pencil-alt"></i> Kerjakan</a>
                        </div>
                    </div>
                </div>
                @endif

                @endforeach
                @else

                @endif

                @endif
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