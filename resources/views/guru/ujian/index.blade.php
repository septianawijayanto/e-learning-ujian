@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a>
        </div>
        <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data </a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Ujian</th>
                <th scope="col">Jenis </th>
                <th scope="col">Waktu</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Guru</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->paket}}</td>
                <td>{{$dt->jenis}}</td>
                <td>{{$dt->waktu}}</td>
                <td>{{$dt->mapel->mapel}}</td>
                <th>{{$dt->guru->nama}}</th>
                <td>{{$dt->deskripsi}}</td>
                <td>
                    <a href="{{url('guru/ujian/'.$dt->id.'/edit')}}" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i> Edit </a>
                    <a href="{{url('guru/ujian/'.$dt->id.'/detail')}}" class="btn btn-success btn-sm btn-flat"><i class="ni ni-ruler-pencil"></i> Buat Soal</a>
                    <a href="{{url('guru/ujian/'.$dt->id.'/delete')}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i> Hapus </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ujian.store') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('mapel_id') ? 'has-error' :''}}">
                        <label for="exampleFormControlSelect1">Pilih Mapel</label>
                        <select name="mapel_id" class="form-control" id="mapel_id">
                            <option value="">-Pilih-</option>
                            @foreach($mapel as $mapel)
                            <option value="{{$mapel->id}}">{{$mapel->mapel}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('mapel_id'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('mapel_id')}}</span>
                        @endif
                    </div>

                    <div class="form-group {{$errors->has('jenis') ? 'has-error' :''}}">
                        <label for="exampleFormControlSelect1">Pilih Jenis</label>
                        <select name="jenis" class="form-control" id="jenis">
                            <option value="">-Pilih-</option>
                            <option value="Ujian" {{(old('jenis') == 'Ujian')? 'selected':''}}>Ujian</option>
                            <option value="Latihan" {{(old('jenis') == 'Latihan')? 'selected':''}}>Latihan</option>
                        </select>
                        @if($errors->has('jenis'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('jenis')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('paket') ? 'has-error' :''}}">
                        <label for="exampleFormControlSelect1">Ujian</label>
                        <input name="paket" type="text" class="form-control" id="inputpaket" placeholder="Input Judul Ujian" value="{{(request('paket'))}}">
                        @if($errors->has('paket'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('paket')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('waktu') ? 'has-error' :''}}">
                        <label for="exampleFormControlSelect1">Waktu</label>
                        <input name="waktu" type="text" class="form-control" id="inputwaktu" placeholder="Input Waktu" value="{{(request('waktu'))}}">
                        @if($errors->has('waktu'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('waktu')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                        <label for="exampleFormControlTextarea1">Keterangan</label>
                        <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{old('deskripsi')}}</textarea>
                        @if($errors->has('deskripsi'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('deskripsi')}}</span>
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