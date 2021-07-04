@extends('admin.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a>
        </div>
        <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> </a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>

                <th scope="col">Guru</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->guru->nama}}</td>
                <td>{{$dt->kelas}}</td>
                <td>
                    <a href="{{url('admin/kelas/'.$dt->id.'/edit/')}}" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{url('admin/kelas/'.$dt->id.'/delete')}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i></a>
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
                <h5 class="modal-title">Tambah Data Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kelas.store') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('guru_id') ? 'has-error' :''}}">
                        <label for="exampleFormControlSelect1">Pilih Guru</label>
                        <select name="guru_id" class="form-control" id="guru_id">
                            <option value="">-Pilih-</option>
                            @foreach($guru as $guru)
                            <option value="{{$guru->id}}">{{$guru->nama}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('guru_id'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('guru_id')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('kelas') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Kelas</label>
                        <input name="kelas" type="text" class="form-control" id="inputkelas" placeholder="Input Kelas" value="{{old('kelas')}}">
                        @if($errors->has('kelas'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('kelas')}}</span>
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