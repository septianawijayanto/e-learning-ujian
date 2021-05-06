@extends('siswa.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form action="{{route('gabung')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('kode') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Kelas Online</label>
                    <input name="kode" type="text" class="form-control" id="inputkode" placeholder="Input kode" value="{{old('kode')}}">
                    @if($errors->has('kode'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('kode')}}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="ni ni-send"></i> Gabung</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection