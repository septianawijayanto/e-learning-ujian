@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col-8">
            <h3 class="mb-0">{{$title}} {{strtoupper(request()->jenis)}}</h3>
        </div>
    </div>
</div>
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{route('tugas')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('judul') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input name="judul" type="text" class="form-control" id="inputjudul" placeholder="Input judul" value="{{old('judul')}}">
                    @if($errors->has('judul'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('judul')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('jenis') ? 'has-error' :''}}">
                    <input name="jenis" type="hidden" class="form-control" id="inputjenis" placeholder="Input jenis" value="{{(request('jenis'))}}">
                    @if($errors->has('jenis'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('jenis')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('kelas_id') ? 'has-error' :''}}">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" class="form-control" id="kelas_id" require>
                        <option value="">-Pilih-</option>
                        @foreach($kelas as $kelas)
                        <option value="{{$kelas->id}}">{{$kelas->kelas}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kelas_id'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('kelas_id')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('grup_id') ? 'has-error' :''}}">
                    <label for="grup_id">Grup</label>
                    <select name="grup_id" class="form-control" id="grup_id" require>
                        <option value="">-Pilih-</option>
                        @foreach($grup as $grup)
                        <option value="{{$grup->id}}">{{$grup->kelas->kelas}} : {{$grup->mapel->mapel}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('grup_id'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('grup_id')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('jenis') ? 'has-error' :''}}">
                    <input name="jenis" type="hidden" class="form-control" id="inputjenis" placeholder="Input jenis" value="{{(request('jenis'))}}">
                    @if($errors->has('jenis'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('jenis')}}</span>
                    @endif
                </div>
                @if(request('jenis')=='file')
                <div class="form-group {{$errors->has('isi') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Upload Tugas File</label>
                    <input name="isi" type="file" class="form-control" id="inputisi" placeholder="Input isi" value="{{old('isi')}}">
                    @if($errors->has('isi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('isi')}}</span>
                    @endif
                </div>
                @endif
                @if(request('jenis')=='teks'||request('jenis')=='vidio')
                <div class="form-group {{$errors->has('isi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Isi Tugas</label>
                    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{old('isi')}}</textarea>
                    @if($errors->has('isi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('isi')}}</span>
                    @endif
                </div>
                @endif
                <div class="form-group {{$errors->has('batas_waktu') ? 'has-error' :''}}">
                    <label for="waktu">Batas Waktu</label>
                    <input name="batas_waktu" type="datetime-local" class="form-control" id="inputbatas_waktu" placeholder="Input batas_waktu" value="{{(old('batas_waktu'))}}">
                    @if($errors->has('batas_waktu'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('batas_waktu')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Deskripsi Tugas</label>
                    <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{old('deskripsi')}}</textarea>
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