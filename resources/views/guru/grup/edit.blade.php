@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">

            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{route('grup')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form action="{{ url('guru/grup/'.$data->id.'/update') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('kelas_id') ? 'has-error' :''}}">
                    <label for="kelas_id">Mapel</label>
                    <select name="kelas_id" class="form-control" id="kelas_id" require>
                        <option value="">-Pilih-</option>
                        @foreach($kelas as $k)
                        <option value="{{$k->id}}" @if ($k->id===$data->kelas_id)
                            selected
                            @endif>{{$k->kelas}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kelas_id'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('kelas_id')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('mapel_id') ? 'has-error' :''}}">
                    <label for="mapel_id">Mapel</label>
                    <select name="mapel_id" class="form-control" id="mapel_id" require>
                        <option value="">-Pilih-</option>
                        @foreach($mapel as $m)
                        <option value="{{$m->id}}" @if ($m->id===$data->mapel_id)
                            selected
                            @endif>{{$m->mapel}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('mapel_id'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('mapel_id')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{$data->deskripsi}}</textarea>
                    @if($errors->has('deskripsi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('deskripsi')}}</span>
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