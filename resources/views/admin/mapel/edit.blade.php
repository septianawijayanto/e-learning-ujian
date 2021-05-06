@extends('admin.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">

            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{route('mapel')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form action="{{ url('admin/mapel/'.$data->id.'/update') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('kode_mapel') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Kode Mata Pelajaran</label>
                    <input name="kode_mapel" type="text" class="form-control" id="inputkode_mapel" placeholder="Input Kode Mata Pelajaran" value="{{$data->kode_mapel}}">
                    @if($errors->has('kode_mapel'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('kode_mapel')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('mapel') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Mapel</label>
                    <input name="mapel" type="text" class="form-control" id="inputmapel" placeholder="Input Mata Pelajaran" value="{{$data->mapel}}">
                    @if($errors->has('mapel'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('mapel')}}</span>
                    @endif
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