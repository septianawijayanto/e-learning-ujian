@extends('admin.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">

            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{route('kelas')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form action="{{ url('admin/kelas/'.$data->id.'/update') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('guru_id') ? 'has-error' :''}}">
                    <label for="exampleFormControlSelect1">Pilih Guru</label>
                    <select name="guru_id" class="form-control" id="guru_id">
                        <option value="">-Pilih-</option>
                        @foreach($guru as $guru)
                        <option value="{{$guru->id}}" @if ($guru->id===$data->guru_id)
                            selected
                            @endif>{{$guru->nama}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('guru_id'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('guru_id')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('kelas') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Kelas</label>
                    <input name="kelas" type="text" class="form-control" id="inputkelas" placeholder="Input Kelas" value="{{$data->kelas}}">
                    @if($errors->has('kelas'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('kelas')}}</span>
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