@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">

            <button class="btn btn-sm btn-flat btn-warning btn-refresh"> Refresh</button>
        </div>
        <div class="col text-right">
            <a href="{{route('ujian')}}" class="btn btn-sm btn-flat btn-success">Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <form action="{{ url('guru/ujian/'.$data->id.'/update') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
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
                <!-- <div class="form-group {{$errors->has('guru_id') ? 'has-error' :''}}">
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
                </div> -->
                <div class="form-group {{$errors->has('jenis') ? 'has-error' :''}}">
                    <label for="exampleFormControlSelect1">Pilih Paket</label>
                    <select name="jenis" class="form-control" id="exampleFormControlSelect1">
                        <option value="">-Pilih-</option>
                        <option value="Ujian" @if($data->jenis=='Ujian') selected @endif>Ujian</option>
                        <option value="Latihan" @if($data->jenis=='Latihan') selected @endif>Latihan</option>
                    </select>
                    @if($errors->has('jenis'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('jenis')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('paket') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Ujian</label>
                    <input name="paket" type="text" class="form-control" id="inputpaket" placeholder="Input Ujian" value="{{$data->paket}}">
                    @if($errors->has('paket'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('paket')}}</span>
                    @endif
                </div>
                <div class="form-group {{$errors->has('waktu') ? 'has-error' :''}}">
                    <label for="exampleFormControlInput1">Waktu</label>
                    <input name="waktu" type="text" class="form-control" id="inputwaktu" placeholder="Input Waktu" value="{{$data->waktu}}">
                    @if($errors->has('waktu'))
                    <span class="right badge badge-danger" class=" help-block">{{$errors->first('waktu')}}</span>
                    @endif
                </div>

                <div class="form-group {{$errors->has('deskripsi') ? 'has-error' :''}}">
                    <label for="exampleFormControlTextarea1">Keterangan</label>
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