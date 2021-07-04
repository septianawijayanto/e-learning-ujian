@extends('siswa.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col">
            <a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a>
        </div>
        <div class="col text-right">
            <a href="#!" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Gabung Ke Grup </a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush mytable">
        <thead class="thead-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
                <th scope="col">Guru</th>
                <th scope="col">Mapel</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal Bergabung</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $e=>$dt)
            <tr>
                <td>{{$e+1}}</td>
                <td>{{$dt->grup->kelas->kelas}}</td>
                <td>{{$dt->grup->guru->nama}}</td>
                <td>{{$dt->grup->mapel->mapel}}</td>
                <td>{{$dt->grup->deskripsi}}</td>
                <td>{{$dt->created_at}}</td>
                <td>
                    <a href="{{url('siswa/grup/detail/'.$dt->grup_id)}}" class="btn btn-success btn-sm btn-flat"><i class="far fa-eye"></i> Lihat Materi {{$dt->grupmateri->count()}} </a>
                    <a href="{{url('siswa/grup/materi/keluar/'.$dt->id)}}" class="btn btn-danger btn-sm btn-flat" onclick="return confirm('Apakah Anda yakin akan keluar Grup?')"> <i class="far fa-times-circle"></i> Keluar</a>
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