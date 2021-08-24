@extends('admin.layouts.master')
@section('konten')
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">

                <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
            </div>
            <div class="col text-right">
                <a href="{{ route('siswa') }}" class="btn btn-sm btn-flat btn-success">Kembali</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card-body">

                <div class="card card-profile">
                    <img src="{{ asset('admin') }}/assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder"
                        class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    @if ($data->foto == null)
                                        @if ($data->jenkel == 'Laki-laki')
                                            <img src="{{ asset('gambar') }}/laki.png" class="rounded-circle">

                                        @else
                                            <img src="{{ asset('gambar') }}/cewek.png" class="rounded-circle">

                                        @endif

                                    @else
                                        <img src="{{ \Storage::url($data->foto) }}" width="150" height="150"
                                            class="rounded-circle">

                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <div class="card-body pt-0">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th>{{ $data->nama }}</th>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <th>:</th>
                                <th>{{ $data->no_induk }}</th>
                            </tr>
                            <tr>
                                <th>NISN</th>
                                <th>:</th>
                                <th>{{ $data->nisn }}</th>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <th>:</th>
                                <th>{{ $data->username }}</th>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <th>:</th>
                                <th>{{ $data->kelas->kelas }}</th>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <th>:</th>
                                <th>{{ $data->jenkel }}</th>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <th>:</th>
                                <th>{{ $data->agama }}</th>
                            </tr>
                            <tr>
                                <th>No Telepon</th>
                                <th>:</th>
                                <th>{{ $data->no_telp }}</th>
                            </tr>
                            <tr>
                                <th>Tempat Lahir</th>
                                <th>:</th>
                                <th>{{ $data->tempat_lahir }}</th>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <th>:</th>
                                <th>{{ $data->tgl_lahir }}</th>
                            </tr>
                        </thead>
                    </table>
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
