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
                <th scope="col">Kode Mata Pelajaran</th>
                <th scope="col">Mata Pelajaran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->kode_mapel}}</td>
                <td>{{$dt->mapel}}</td>
                <td>
                    <a href="{{url('admin/mapel/'.$dt->id.'/edit/')}}" class="btn btn-warning btn-sm btn-flat"><i class="fas fa-pencil-alt"></i></a>
                    <a href="{{url('admin/mapel/'.$dt->id.'/delete')}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i></a>
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
                <h5 class="modal-title">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mapel.store') }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('kode_mapel') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Kode Mata Pelajaran</label>
                        <input name="kode_mapel" type="text" class="form-control" id="inputkode_mapel" placeholder="Input Kode Mata Pelajaran" value="{{old('kode_mapel')}}">
                        @if($errors->has('kode_mapel'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('kode_mapel')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('mapel') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Mapel</label>
                        <input name="mapel" type="text" class="form-control" id="inputmapel" placeholder="Input Mata Pelajaran" value="{{old('mapel')}}">
                        @if($errors->has('mapel'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('mapel')}}</span>
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