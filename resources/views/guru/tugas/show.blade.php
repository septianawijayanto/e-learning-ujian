@extends('guru.layouts.master')
@section('konten')
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
            Judul :{{strtoupper($data->judul)}}
            <br>
            Nama Materi :{{strtoupper($data->judul)}}
            @if($data->jenis=='file')
            <a href="{{ \Storage::url($data->isi) }}">Lihat File :{{$data->judul}}</a>
            @else
            <div>{!!$data->isi!!}</div>
            @endif
        </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Judul Tugas </th>
                <th scope="col">Jenis</th>
                <th scope="col">Isi</th>
                <th scope="col">Nilai</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jwb as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->siswa->nama}}</td>
                <td>{{$dt->tugas->judul}}</td>
                <td>{{$dt->jenis}}</td>
                <td> @if($dt->jenis=='file')
                    <a href="{{ \Storage::url($dt->isi) }}">Lihat File</a>
                    @else
                    <div>{!!$dt->isi!!}</div>
                    @endif
                </td>
                <td>{{$dt->score}}</td>
                <td>

                    @if($dt->status==1)
                    <a href="{{url('guru/tugas/'.$dt->id.'/terima-jawaban')}}" class="btn btn-success btn-sm btn-flat"><i class="fas fa-pencil-alt"></i> Terima </a>
                    @else
                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#modal-nilai-{{$dt->id}}"><i class="fas fa-pencil-alt"></i> Nilai </button>
                    @endif
                    <a href="{{url('guru/tugas/'.$dt->id.'/delete-jawaban')}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i> Hapus </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@foreach($jwb as $nilai)
<div class="modal" id="modal-nilai-{{$nilai->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('guru/tugas/'.$nilai->id.'/nilai-jawaban')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('score') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Nilai</label>
                        <input name="score" type="text" class="form-control" id="inputscore" placeholder="Input Nilai" value="{{old('score')}}">
                        @if($errors->has('score'))
                        <span class="right badge badge-danger" class=" help-block">{{$errors->first('score')}}</span>
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
@endforeach
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