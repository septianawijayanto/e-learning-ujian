@extends('admin.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a>
        </div>
        <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> </a>
            <a href="{{url('admin/siswa/cetak')}}" class="btn btn-sm btn-success"><i class="fa fa-print"></i> </a>

        </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">No Induk</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Gender</th>
                <th scope="col">TTL</th>
                <th scope="col">Kelas</th>
                <th scope="col">Agama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->no_induk}}</td>
                <td>{{$dt->nisn}}</td>
                <!-- <td> <a href="{{ \Storage::url($dt->foto) }}">Lihat File </a></td> -->
                <td>{{$dt->nama}}</td>
                <td>{{$dt->username}}</td>
                <td>{{$dt->jenkel}}</td>
                <td>{{$dt->tempat_lahir}}, {{$dt->tgl_lahir}}</td>
                <td>{{$dt->kelas->kelas}}</td>
                <td>{{$dt->agama}}</td>
                <td>{{$dt->alamat}}</td>
                @if( $dt->status==1)
                <td>
                    <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">Aktif</span>
                    </span>
                </td>
                @elseif( $dt->status==2)
                <td>
                    <span class="badge badge-dot mr-4">
                        <i class="bg-danger"></i>
                        <span class="status">Non-Aktif</span>
                    </span>
                </td>
                @endif
                <td>
                    <a href="{{url('admin/siswa/'.$dt->id.'/edit/')}}" class="btn btn-warning btn-sm btn-flat"> <i class="fas fa-pencil-alt"></i></a>
                    <a href="{{url('admin/siswa/'.$dt->id.'/delete')}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i></a>
                    <a href="{{url('admin/siswa/'.$dt->id.'/show')}}" class="btn btn-success btn-sm btn-flat"><i class="far fa-eye"></i></a>
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
                <h5 class="modal-title">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-lg-6">

                            <div class="form-group {{$errors->has('no_induk') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">No Induk</label>
                                <input name="no_induk" type="text" class="form-control" id="inputno_induk" placeholder="Input No Induk" value="{{old('no_induk')}}">
                                @if($errors->has('no_induk'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('no_induk')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('nisn') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">NISN</label>
                                <input name="nisn" type="text" class="form-control" id="inputnisn" placeholder="Input No Induk" value="{{old('nisn')}}">
                                @if($errors->has('nisn'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('nisn')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('nama') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input name="nama" type="text" class="form-control" id="inputnama" placeholder="Input Nama" value="{{old('nama')}}">
                                @if($errors->has('nama'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('nama')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('username') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Username</label>
                                <input name="username" type="text" class="form-control" id="inputusername" placeholder="Input Username" value="{{old('username')}}">
                                @if($errors->has('username'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('username')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('foto') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Foto</label>
                                <input name="foto" type="file" class="form-control" id="inputfoto" placeholder="Input foto" value="{{old('foto')}}">
                                @if($errors->has('foto'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('foto')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('password') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputpassword1" placeholder="Input Password" value="{{old('password')}}">
                                @if($errors->has('password'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('kelas_id') ? 'has-error' :''}}">
                                <label for="exampleFormControlSelect1">Pilih Kelas</label>
                                <select name="kelas_id" class="form-control" id="kelas_id">
                                    <option value="">-Pilih-</option>
                                    @foreach($kelas as $kelas)
                                    <option value="{{$kelas->id}}">{{$kelas->kelas}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('kelas_id'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('kelas_id')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('tempat_lahir') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Tempat Tahir</label>
                                <input name="tempat_lahir" type="text" class="form-control" id="inputtempat_lahir" placeholder="Input Tempat Lahir" value="{{old('tempat_lahir')}}">
                                @if($errors->has('tempat_lahir'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('tempat_lahir')}}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group {{$errors->has('tgl_lahir') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                <input name="tgl_lahir" type="date" class="form-control" id="inputtgl_lahir" placeholder="Input Tanggal Lahir" value="{{old('tgl_lahir')}}">
                                @if($errors->has('tgl_lahir'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('tgl_lahir')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('no_telp') ? 'has-error' :''}}">
                                <label for="exampleFormControlInput1">No Telepon</label>
                                <input name="no_telp" type="text" class="form-control" id="inputno_telp" placeholder="Input No Telepon" value="{{old('no_telp')}}">
                                @if($errors->has('no_telp'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('no_telp')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('jenkel') ? 'has-error' :''}}">
                                <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                <select name="jenkel" class="form-control" id="jenkel">
                                    <option value="">-Pilih-</option>
                                    <option value="Laki-laki" {{(old('jenkel') == 'Laki-laki')? 'selected':''}}>Laki-Laki</option>
                                    <option value="Perempuan" {{(old('jenkel') == 'Perempuan')? 'selected':''}}>Perempuan</option>
                                </select>
                                @if($errors->has('jenkel'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('jenkel')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('agama') ? 'has-error' :''}}">
                                <label for="exampleFormControlSelect1">Pilih Agama</label>
                                <select name="agama" class="form-control" id="agama">
                                    <option value="">-Pilih-</option>
                                    <option value="Islam" {{(old('agama') == 'Islam')? 'selected':''}}>Islam</option>
                                    <option value="Katolik" {{(old('agama') == 'Katolik')? 'selected':''}}>Katolik</option>
                                    <option value="Kristen" {{(old('agama') == 'Kristen')? 'selected':''}}>Kristen</option>
                                    <option value="Budha" {{(old('agama') == 'Budha')? 'selected':''}}>Budha</option>
                                    <option value="Hindu" {{(old('agama') == 'Hindu')? 'selected':''}}>Hindu</option>
                                </select>
                                @if($errors->has('agama'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('agama')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('alamat') ? 'has-error' :''}}">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="4">{{old('alamat')}}</textarea>
                                @if($errors->has('alamat'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('alamat')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3">{{old('deskripsi')}}</textarea>
                                @if($errors->has('deskripsi'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('deskripsi')}}</span>
                                @endif
                            </div>
                            <div class="form-group {{$errors->has('status') ? 'has-error' :''}}">
                                <label for="exampleFormControlSelect1">Pilih Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="">-Pilih-</option>
                                    <option value="1" {{(old('status') == '1')? 'selected':''}}>Aktif</option>
                                    <option value="2" {{(old('status') == '2')? 'selected':''}}>Nonaktif</option>
                                </select>
                                @if($errors->has('status'))
                                <span class="right badge badge-danger" class=" help-block">{{$errors->first('status')}}</span>
                                @endif
                            </div>
                        </div>
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