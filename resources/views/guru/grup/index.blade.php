@extends('guru.layouts.master')
@section('konten')
<div class="card-header border-0">
    <div class="row align-items-center">
        <div class="col"><a href="#!" class="btn btn-sm btn-warning btn-refresh">Refresh</a></div>
        <div class="col text-right"><a href="#!" class="btn btn-sm btn-primary" data-toggle="modal"
                data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data </a></div>
    </div>
</div>
<div class="table-responsive">
    < !-- Projects table -->
        <table class="table align-items-center table-flush mytable">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Guru</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Mapel</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $e => $dt)
                <tr>
                    <td> {
                        {
                        $e+1
                        }
                        }

                    </td>
                    <td> {
                        {
                        $dt->kode
                        }
                        }

                    </td>
                    <td> {
                        {
                        $dt->guru->nama
                        }
                        }

                    </td>
                    <td> {
                        {
                        $dt->kelas->kelas
                        }
                        }

                    </td>
                    <td> {
                        {
                        $dt->mapel->mapel
                        }
                        }

                    </td>
                    <td> {
                        {
                        $dt->deskripsi
                        }
                        }

                    </td>
                    <td> {
                        {
                        $dt->status
                        }
                        }

                    </td>
                    <td><a href="{{ url('guru/grup/' . $dt->id . '/edit') }}" class="btn btn-warning btn-sm btn-flat"><i
                                class="fas fa-pencil-alt"></i>Edit </a><a
                            href="{{ url('guru/grup/' . $dt->id . '/delete') }}" class="btn btn-danger btn-sm btn-flat"
                            onclick="return confirm('Apakah Akan Anda Hapus?')"><i class="far fa-times-circle"></i>Hapus
                        </a><a href="{{ url('guru/grup/' . $dt->id . '/detail') }}"
                            class="btn btn-success btn-sm btn-flat"><i class="far fa-eye"></i>Show </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Mata Pelajaran</h5><button type="button" class="close"
                    data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;

                    </span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grup.store') }}" method="POST" enctype="multipart/form-data"> {
                    {
                    csrf_field()
                    }
                    }

                    <div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }}"><label
                            for="exampleFormControlInput1">Kode</label><input name="kode" type="text"
                            class="form-control" id="exampleInputkode1" readonly placeholder="Input kode"
                            value="{{ $kode }}">
                        @if ($errors->has('kode')) <span class="right badge badge-danger" class=" help-block"> {
                            {
                            $errors->first('kode')
                            }
                            }

                        </span>@endif
                    </div>
                    <div class="form-group {{ $errors->has('kelas_id') ? 'has-error' : '' }}"><label
                            for="kelas_id">Kelas</label><select name="kelas_id" class="form-control" id="kelas_id"
                            require>
                            <option value="">-Pilih-</option>
                            @foreach ($kelas as $k)
                            <option value="{{ $k->id }}"> {
                                {
                                $k->kelas
                                }
                                }

                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('kelas_id')) <span class="right badge badge-danger" class=" help-block"> {
                            {
                            $errors->first('kelas_id')
                            }
                            }

                        </span>@endif
                    </div>
                    <div class="form-group {{ $errors->has('mapel_id') ? 'has-error' : '' }}"><label
                            for="mapel_id">Mapel</label><select name="mapel_id" class="form-control" id="mapel_id"
                            require>
                            <option value="">-Pilih-</option>
                            @foreach ($mapel as $m)
                            <option value="{{ $m->id }}"> {
                                {
                                $m->mapel
                                }
                                }

                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('mapel_id')) <span class="right badge badge-danger" class=" help-block"> {
                            {
                            $errors->first('mapel_id')
                            }
                            }

                        </span>@endif
                    </div>
                    <div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : '' }}"><label
                            for="exampleFormControlTextarea1">Deskripsi</label><textarea name="deskripsi"
                            class="form-control" id="exampleFormControlTextarea1" rows="4"> {
                                        {
                                        old('deskripsi')
                                    }
                                }

                                </textarea>
                        @if ($errors->has('deskripsi')) <span class="right badge badge-danger" class=" help-block"> {
                            {
                            $errors->first('deskripsi')
                            }
                            }

                        </span>@endif
                    </div>
                    <div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="fas  fa-power-off"></i>Tutup</button><button type="submit"
                            class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button></div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {

                // btn refresh
                $('.btn-refresh').click(function (e) {
                        e.preventDefault();
                        $('.preloader').fadeIn();
                        location.reload();
                    }

                )
            }

        )

    </script>@endsection
