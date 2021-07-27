@extends('admin.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">

            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{route('guru')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form action="{{ url('admin/guru/'.$data->id.'/update') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group {{$errors->has('nama') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input name="nama" type="text" class="form-control" id="inputnama" placeholder="Input Nama" value="{{$data->nama}}">
                            @if($errors->has('nama'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('nama')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('no_induk') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">No Induk</label>
                            <input name="no_induk" type="text" class="form-control" id="inputno_induk" placeholder="Input No Induk" value="{{$data->no_induk}}">
                            @if($errors->has('no_induk'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('no_induk')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('golongan') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Golongan</label>
                            <input name="golongan" type="text" class="form-control" id="inputgolongan" placeholder="Input golongan" value="{{$data->golongan}}">
                            @if($errors->has('golongan'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('golongan')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('lulusan') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Pendidikan</label>
                            <input name="lulusan" type="text" class="form-control" id="inputlulusan" placeholder="Input Pendidikan" value="{{$data->lulusan}}">
                            @if($errors->has('lulusan'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('lulusan')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('username') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Username</label>
                            <input name="username" type="text" class="form-control" id="inputusername" placeholder="Input Username" value="{{$data->username}}">
                            @if($errors->has('username'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('username')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('foto') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Foto</label>
                            <input name="foto" type="file" class="form-control" id="inputfoto" placeholder="Input No Telepon" value="{{$data->foto}}">
                            @if($errors->has('foto'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('foto')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('password') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputpassword1" placeholder="Input Password" value="">
                            <labe class="badge badge-primary">Inputkan Ulang Jika Ingi Rubah Data</labe>
                            @if($errors->has('password'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Tempat Tahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" id="inputtempat_lahir" placeholder="Input Tempat Lahir" value="{{$data->tempat_lahir}}">
                            @if($errors->has('tempat_lahir'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('tempat_lahir')}}</span>
                            @endif
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group {{$errors->has('tgl_lahir') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Tanggal Lahir</label>
                            <input name="tgl_lahir" type="date" class="form-control" id="inputtgl_lahir" placeholder="Input Tanggal Lahir" value="{{$data->tgl_lahir}}">
                            @if($errors->has('tgl_lahir'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('tgl_lahir')}}</span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('no_telp') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">No Telepon</label>
                            <input name="no_telp" type="text" class="form-control" id="inputno_telp" placeholder="Input No Telepon" value="{{$data->no_telp}}">
                            @if($errors->has('no_telp'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('no_telp')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('jenkel') ? 'has-error' :''}}">
                            <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                            <select name="jenkel" class="form-control" id="exampleFormControlSelect1">
                                <option value="">-Pilih-</option>
                                <option value="Laki-laki" @if($data->jenkel=='Laki-laki') selected @endif>Laki-laki</option>
                                <option value="Perempuan" @if($data->jenkel=='Perempuan') selected @endif>Perempuan</option>
                            </select>
                            @if($errors->has('jenkel'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('jenkel')}}</span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('agama') ? 'has-error' :''}}">
                            <label for="exampleFormControlSelect1">Pilih Agama</label>
                            <select name="agama" class="form-control" id="agama">
                                <option value="">-Pilih-</option>
                                <option value="Islam" @if($data->agama=='Islam') selected @endif>Islam</option>
                                <option value="Katolik" @if($data->agama=='Katolik') selected @endif>Katolik</option>
                                <option value="Kristen" @if($data->agama=='Kristen') selected @endif>Kristen</option>
                                <option value="Budha" @if($data->agama=='Budha') selected @endif>Budha</option>
                                <option value="Hindu" @if($data->agama=='Hindu') selected @endif>Hindu</option>

                            </select>
                            @if($errors->has('agama'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('agama')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('alamat') ? 'has-error' :''}}">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="4">{{$data->alamat}}</textarea>
                            @if($errors->has('alamat'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('alamat')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{$data->deskripsi}}</textarea>
                            @if($errors->has('deskripsi'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('deskripsi')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('status') ? 'has-error' :''}}">
                            <label for="exampleFormControlSelect1">Pilih Status</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value="">-Pilih-</option>
                                <option value="1" @if($data->status=='1') selected @endif>Aktif</option>
                                <option value="2" @if($data->status=='2') selected @endif>Nonaktif</option>
                            </select>
                            @if($errors->has('status'))
                            <span class="right badge badge-danger" class=" help-block">{{$errors->first('status')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
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