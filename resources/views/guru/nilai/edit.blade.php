@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">

            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{route('materi.guru')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form action="{{ url('guru/materi/'.$data->id.'/update') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('kelas_id') ? 'has-error' :''}}">
                    <label for="exampleFormControlSelect1">Pilih Kelas</label>
                    <select name="kelas_id" class="form-control" id="kelas_id">
                        <option value="">-Pilih-</option>
                        @foreach($kelas as $kelas)
                        <option value="{{$kelas->id}}" @if ($kelas->id===$data->kelas_id)
                            selected
                            @endif>{{$kelas->kelas}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('kelas_id'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('kelas_id')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('mapel_id') ? 'has-error' :''}}">
                    <label for="exampleFormControlSelect1">Pilih Mapel</label>
                    <select name="mapel_id" class="form-control" id="mapel_id">
                        <option value="">-Pilih-</option>
                        @foreach($mapel as $mapel)
                        <option value="{{$mapel->id}}" @if ($mapel->id===$data->mapel_id)
                            selected
                            @endif>{{$mapel->mapel}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('mapel_id'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('mapel_id')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('judul') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input name="judul" type="text" class="form-control" id="inputjudul" placeholder="Input Kode Mata Pelajaran" value="{{$data->judul}}">
                    @if($errors->has('judul'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('judul')}}</span>
                    @endif
                </div>
                @if($data->jenis=='file')
                <div class="form-group {{$errors->has('isi') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Nama File</label>
                    <input name="isi" type="file" class="form-control" id="inputisi" placeholder="Input Nama File" value="{{$data->isi}}">
                    @if($errors->has('isi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('isi')}}</span>
                    @endif
                </div>
                @endif
                @if($data->jenis=='teks'||$data->jenis=='vidio')
                <div class="form-group {{$errors->has('isi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Isi Materi</label>
                    <textarea name="isi" class="form-control" id="exampleFormControlTextarea1" rows="4">{{$data->isi}}</textarea>
                    @if($errors->has('isi'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('isi')}}</span>
                    @endif
                </div>
                @endif
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