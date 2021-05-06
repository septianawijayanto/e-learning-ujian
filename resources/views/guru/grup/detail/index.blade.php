@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a>
        </div>
        <div class="col text-right">
            <button type="button" class="btn btn-sm btn-flat btn-primary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <b><i class="fa fa-database"></i> Tambah</b>
            </button>
            <div class="dropdown-menu " x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                <button style="color: black;" class="dropdown-item" data-toggle="modal" data-target="#exampleModal"> Materi </button>
                <button style="color: black;" class="dropdown-item" data-toggle="modal" data-target="#modalsiswa"> Siswa</button>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Kode</th>
                <th scope="col">{{$data->kode}}</th>
            </tr>
            <tr>
                <th scope="col">Kelas</th>
                <th scope="col">{{$data->kelas->kelas}}</th>
            </tr>
            <tr>
                <th scope="col">Mapel</th>
                <th scope="col">{{$data->mapel->mapel}}</th>
            </tr>
            <tr>
                <th scope="col">Deskripsi</th>
                <th scope="col">{{$data->deskripsi}}</th>
            </tr>
        </thead>
    </table>
</div>
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Materi Belajar</h3>
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
                <th scope="col">Tanggal Buat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->grupmateri as $dt )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <p>{{$dt->judul}}</p>
                    {!!$dt->materi->jenis !!} : {{$dt->materi->judul}}
                </td>
                <td>{{$dt->materi->created_at}}</td>
                <td>
                    <a href="{{url('guru/grup-materi/detail/'.$dt->id)}}" class="btn btn-success btn-sm btn-flat"> <i class="far fa-eye"></i>Detail Materi</a>
                    <a href="{{url('guru/grup-materi/delete/'.$dt->id)}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i> Hapus </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Daftar Siswa</h3>
        </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal Buat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->grupsiswa as $dt )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td> {{$dt->siswa->nama}} </td>
                <td>{{$dt->deskripsi}}</td>
                <td> {{$dt->siswa->created_at}} </td>
                <td>
                    <!-- <a href="{{url('grup-materi/detail/'.$dt->id)}}" class="btn btn-success btn-sm btn-flat"> Detail Materi</a> -->
                    <a href="{{url('guru/grup-siswa/delete/'.$dt->id)}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i> Hapus </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Aktivitas Siswa</h3>
        </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Siswa</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupaktivitas as $dt )
            <tr>
                <td>{{$loop->iteration}}</td>
                <td> {{$dt->siswa->nama}} </td>
                <td>{{$dt->deskripsi}}</td>
                <td> {{$dt->created_at->format('d-m-Y H:i')}} </td>

            </tr>
            @endforeach

        </tbody>
    </table>

</div>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('guru/grup-materi?id='.$data->id) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('judul') ? 'has-error' :''}}">
                        <label for="materi_id">Judul</label>
                        <input name="judul" type="text" class="form-control" id="inputjudul" placeholder="Input judul" value="{{(request('judul'))}}">
                        @if($errors->has('judul'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('judul')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('materi_id') ? 'has-error' :''}}">
                        <label for="materi_id">Materi</label>
                        <select name="materi_id" class="form-control" id="materi_id" require>
                            <option value="">-Pilih-</option>
                            @foreach($materi as $kt)
                            <option value="{{$kt->id}}">{{$kt->jenis}}: {{$kt->judul}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('materi_id'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('materi_id')}}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas  fa-power-off"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalsiswa" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('guru/grup-siswa/create?id='.$data->id) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('username') ? 'has-error' :''}}">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" id="inputusername" placeholder="Input username" value="{{(request('username'))}}">
                        @if($errors->has('username'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('username')}}</span>
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas  fa-power-off"></i> Tutup</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </form>
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