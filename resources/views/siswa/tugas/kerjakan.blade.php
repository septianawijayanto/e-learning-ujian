@extends('siswa.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col-8">
            <h3 class="mb-0">{{$title}} {{$data->jenis}}</h3>
        </div>
    </div>
</div>
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{route('tugas.index')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">

        <div class="card-body">

            <!-- Form Belum Dikerjakan -->
            @if($cek==0)
            <form action="{{url('siswa/tugas/simpan?id='.$data->id) }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3 class="mb-0">
                    <span class="badge badge-warning">Belum Dikerjakan</span>
                </h3>
                <div class="form-group {{$errors->has('jenis') ? 'has-error' :''}}">
                    <input name="jenis" type="hidden" class="form-control" id="inputjenis" placeholder="Input jenis" value="{{(request('jenis'))}}">
                    @if($errors->has('jenis'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('jenis')}}</span>
                    @endif
                </div>
                @if($data->jenis=='file')
                <div class="form-group {{$errors->has('isi') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Isi File</label>
                    <input name="isi" type="file" class="form-control" id="inputisi" placeholder="Input Nama File" value="{{old('isi')}}">
                    @if($errors->has('isi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('isi')}}</span>
                    @endif
                </div>
                @else($data->jenis=='teks'||$data->jenis=='vidio')
                <div class="form-group {{$errors->has('isi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Isi Jawaban</label>
                    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{old('isi')}}</textarea>
                    @if($errors->has('isi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('isi')}}</span>
                    @endif
                </div>
                @endif
                <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{old('deskripsi')}}</textarea>
                    @if($errors->has('deskripsi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('deskripsi')}}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
            <!-- Form Akhir -->

            <!-- Form Sudah Dikerjakan -->
            @else
            <form action="{{url('siswa/tugas/'.$tgs->id.'/update')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <h3 class="mb-0">
                    <span class="badge badge-success">Sudah Dikerjakan</span>
                </h3>
                <div class="form-group {{$errors->has('jenis') ? 'has-error' :''}}">
                    <input name="jenis" type="hidden" class="form-control" id="inputjenis" placeholder="Input jenis" value="{{(request('jenis'))}}">
                    @if($errors->has('jenis'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('jenis')}}</span>
                    @endif
                </div>
                @if($data->jenis=='file')
                <div class="form-group {{$errors->has('isi') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Isi File</label>
                    <input name="isi" type="file" class="form-control" id="inputisi" placeholder="Input Nama File" value="{{$tgs->isi}}">
                    @if($errors->has('isi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('isi')}}</span>
                    @endif
                </div>
                @endif
                @if($data->jenis=='teks'||$data->jenis=='vidio')
                <div class="form-group {{$errors->has('isi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Isi Materi</label>
                    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{$tgs->isi}}</textarea>
                    @if($errors->has('isi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('isi')}}</span>
                    @endif
                </div>
                @endif
                @if($cek>0)
                @if($tgs->jenis=='file')
                <a href="{{ \Storage::url($tgs->isi) }}">Lihat File</a>
                @else
                <div>{!!$tgs->isi!!}</div>
                @endif
                @endif
                <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{$tgs->deskripsi}}</textarea>
                    @if($errors->has('deskripsi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('deskripsi')}}</span>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>

            </form>
            @endif
            <!-- Akhir -->

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