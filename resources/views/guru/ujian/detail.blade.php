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
    @foreach($ujian as $ujian)
    <div class="col-md-4">
        <div class="card-body">
            <h4 class="heading">Basic Info</h4>
            <div class="row">
                <div class="col">
                    <h5 class="card-text mb-2">Kode</h5>
                </div>
                <div class="col">
                    <h5 class="card-text mb-2">{{$ujian->ujian_id}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="card-text mb-2">Nama Paket</h5>
                </div>
                <div class="col">
                    <h5 class="card-text mb-2">{{$ujian->paket}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="card-text mb-2">Deskripsi</h5>
                </div>
                <div class="col">
                    <h5 class="card-text mb-2">{{$ujian->deskripsi}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="card-text mb-2">Jenis</h5>
                </div>
                <div class="col">
                    <h5 class="card-text mb-2">{{$ujian->jenis}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="card-text mb-2">Waktu</h5>
                </div>
                <div class="col">
                    <h5 class="card-text mb-2">{{$ujian->waktu}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="card-text mb-2">Dibuat Oleh</h5>
                </div>
                <div class="col">
                    <h5 class="card-text mb-2">{{$ujian->nama_guru}}</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="heading">Data Kelas</h4>
            <div class="table-responsive">
                <table class="table align-items-center table-flush mytable">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th width="50">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="ujian_id" placeholder="Input jenis" value="{{$ujian->id}}">
                        </div>
                        @if($kelas->count())
                        @foreach($kelas as $kelas)
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id{{$kelas->id}}" placeholder="Input jenis" value="{{$kelas->id}}">
                        </div>
                        <tr>
                            <td>{{ $kelas->kelas }}</td>
                            <td align="center">
                                <div id="wrap-status-ujian{{ $kelas->id }}">
                                    @if($kelas->ujian_id != "")
                                    @if($kelas->ujian_id == Request::segment(3))
                                    <span data-toggle="tooltip" title="Kelas ini dapat mengerjakan ujian Anda. Klik untuk merubah status ujian pada kelas ini." id="terbitkan-soal{{ $kelas->id }}"><i style="color: limegreen; font-size: 16pt; cursor: pointer;" class="fa fa-check-square"></i></span>
                                    @else
                                    <span data-toggle="tooltip" title="Kelas ini tidak dapat mengerjakan ujian Anda. Klik untuk merubah status ujian pada kelas ini." id="terbitkan-soal{{ $kelas->id }}"><i style="color: red; font-size: 16pt; cursor: pointer;" class="fa fa-minus-square"></i></span>
                                    @endif
                                    @else
                                    <span data-toggle="tooltip" title="Kelas ini tidak dapat mengerjakan ujian Anda. Klik untuk merubah status ujian pada kelas ini." id="terbitkan-soal{{ $kelas->id }}"><i style="color: red; font-size: 16pt; cursor: pointer;" class="fa fa-minus-square"></i></span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @push('page-scripts')

                        <script type="text/javascript">
                            $(document).ready(function() {
                                $("#terbitkan-soal{{ $kelas->id }}").click(function() {
                                    var kelas_id = $("#id{{ $kelas->id }}").val();
                                    var ujian_id = $("#ujian_id").val();
                                    $.ajax({
                                        type: "POST",
                                        url: "/guru/ujian/terbitkan-soal",
                                        data: {
                                            kelas_id: kelas_id,
                                            ujian_id: ujian_id
                                        },
                                        success: function(data) {
                                            if (data == 'Y') {
                                                $("#terbitkan-soal{{ $kelas->id }}").html('<i style="color: limegreen; font-size: 16pt; cursor: pointer;" class="fa fa-check-square"></i>');
                                            } else {
                                                $("#terbitkan-soal{{ $kelas->id }}").html('<i style="color: red; font-size: 16pt; cursor: pointer;" class="fa fa-minus-square"></i>');
                                            }
                                            console.log(data.data);
                                        }
                                    });
                                });
                            });
                        </script>
                        @endpush

                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card-body">
            <h5 class="card-title">Buat Soal</h5>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="homepilgan-tab" data-toggle="tab" href="#pilgan" role="tab" aria-controls="pilgan" aria-selected="true">Pilihan Ganda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="essay-tab" data-toggle="tab" href="#essay" role="tab" aria-controls="essay" aria-selected="false">Essay</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pilgan" role="tabpanel" aria-labelledby="pilgan-tab">
                    <form id="pilgan_add">
                        <div class="form-group">
                            <label for="soal">Soal</label>
                            <textarea name="soal" class="form-control" id="soal" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pil_a">Pilahan A</label>
                            <textarea name="pil_a" class="form-control" id="pil_a" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pil_b">Pilahan B</label>
                            <textarea name="pil_b" class="form-control" id="pil_b" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pil_c">Pilahan C</label>
                            <textarea name="pil_c" class="form-control" id="pil_c" rows="2"></textarea>
                        </div>
                        <div class="form-group ">
                            <label for="pil_d">Pilahan D</label>
                            <textarea name="pil_d" class="form-control" id="pil_d" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Kunci</label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="radio" name="kunci" class="kunci" id="kunci" value="A"> Jawaban A</input>
                            </div>
                            <div class="col">
                                <input type="radio" name="kunci" class="kunci" id="kunci" value="B"> Jawaban B</input>
                            </div>
                            <div class="col">
                                <input type="radio" name="kunci" class="kunci" id="kunci" value="C"> Jawaban C</input>
                            </div>
                            <div class="col">
                                <input type="radio" name="kunci" class="kunci" id="kunci" value="D"> Jawaban D</input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Skor</label>
                            <input name="skor" type="text" class="form-control" id="skor" placeholder="Input Skor" value="">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="ujian_id" placeholder="Input jenis" value="{{$ujian->id}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="hidden_id" name="hidden_id" placeholder="Input jenis" value="">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="jenis" name="jenis" placeholder="Input jenis" value="{{$ujian->jenis}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="guru_id" name="guru_id" placeholder="Input jenis" value="{{Session::get('id')}}">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class=""></i> Reset</button>
                            <button type="submit" id="submit_pilgan" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="datatables_pilgan" class="table table-striped">
                                    <!-- <table id="datatables_pilgan" class="table align-items-center table-flush"> -->
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Soal</th>
                                            <th>Kunci</th>
                                            <th>Skor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="essay" role="tabpanel" aria-labelledby="essay-tab">

                    <form id="essay_add">
                        <div class="form-group ">
                            <label for="soal_essay">Soal Essay</label>
                            <textarea name="soal_essay" class="form-control" id="soal_essay" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="ujian_id" placeholder="Input jenis" value="{{$ujian->id}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="hidden_essay" name="hidden_essay" placeholder="Input jenis" value="">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="jenis_soal" name="jenis_soal" placeholder="Input jenis" value="{{$ujian->jenis}}">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="guru_id" name="guru_id" placeholder="Input jenis" value="{{Session::get('id')}}">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal"><i class=""></i> Reset</button>
                            <button type="submit" id="submit_essay" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="datatables_essay" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Soal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#soal').summernote();
        $('#pil_a').summernote();
        $('#pil_b').summernote();
        $('#pil_c').summernote();
        $('#pil_d').summernote();
        $('#soal_essay').summernote();
        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let id;
    $(document).ready(function() {
        id = $('#id').val();
        $('#datatables_pilgan').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: true,
            ajax: {
                url: "{{ route('pilgan.index') }}",
                type: 'GET',
                data: {
                    id: id
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'soal',
                    name: 'soal',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'kunci',
                    name: 'kunci'
                },
                {
                    data: 'skor',
                    name: 'skor'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

            ],

        });
    });

    //edit
    $(document).on('click', '.edit', function() {
        id = $(this).data('id');
        $.ajax({
            url: "/guru/pilgan/" + id + "/edit/",
            dataType: 'json',
            success: function(data) {

                $('#soal').summernote('code', data.soal);
                $('#pil_a').summernote('code', data.pil_a);
                $('#pil_b').summernote('code', data.pil_b);
                $('#pil_c').summernote('code', data.pil_c);
                $('#pil_d').summernote('code', data.pil_d);
                $('#skor').val(data.skor);
                $('input:radio[name=kunci][value=' + data.kunci + ']')[0].checked = true;

                $('#hidden_id').val(data.id);
                $('#action').val('Update');
            }
        });
    })

    $(document).on('click', '#submit_pilgan', function(e) {
        e.preventDefault();
        let url;
        $('#submit_pilgan').html('Submiting...');
        $.ajax({
            url: "/guru/pilgan/add/",
            method: 'POST',
            data: $('#pilgan_add').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.errors) {
                    swal("Error", "Semua Data Wajib diisi", "error")
                        .then(function() {
                            $('#datatables_pilgan').DataTable().ajax.reload();
                            $('#submit_pilgan').html('Submit');

                        });
                } else if (data.success) {
                    swal("Success", "Soal Berhasil ditambah", "success")
                        .then(function() {
                            $('#datatables_pilgan').DataTable().ajax.reload();
                            $('#pilgan_add').trigger('reset');
                            $('#soal').summernote('code', '');
                            $('#pil_a').summernote('code', '');
                            $('#pil_b').summernote('code', '');
                            $('#pil_c').summernote('code', '');
                            $('#pil_d').summernote('code', '');
                            $('#submit_pilgan').html('Submit');

                        });
                } else if (data.update) {
                    swal("Success", "Soal Berhasil dirubah", "success")
                        .then(function() {
                            $('#datatables_pilgan').DataTable().ajax.reload();
                            $('#pilgan_add').trigger('reset');
                            $('#hidden_id').trigger('reset');
                            $('#soal').summernote('code', '');
                            $('#pil_a').summernote('code', '');
                            $('#pil_b').summernote('code', '');
                            $('#pil_c').summernote('code', '');
                            $('#pil_d').summernote('code', '');
                            $('#submit_pilgan').html('Submit');
                        });

                }
            }
        })
    })

    //Delete Button
    $(document).on('click', '.delete', function() {
        id = $(this).data('id');
        $('#konfirmasi-modal').modal('show');
    });
    //Delete

    // Delete
    $('#tombol-hapus').click(function() {
        $.ajax({
            url: "/guru/pilgan/" + id + "/delete",
            type: 'delete',
            beforeSend: function() {
                $('#tombol-hapus').text('Menghapus...');
            },
            success: function(data) {
                setTimeout(function() {
                    $('#konfirmasi-modal').modal('hide');
                    var oTable = $('#datatables_pilgan').dataTable();
                    oTable.fnDraw(false);
                });
                swal("Success", "Data berhasil dihapus", "success");
            }

        })
    });


    //Essay
    $(document).ready(function() {
        id = $('#id').val();
        $('#datatables_essay').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            lengthChange: true,
            ajax: {
                url: "{{ route('essay.index') }}",
                type: 'GET',
                data: {
                    id: id
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'soal',
                    name: 'soal',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }

            ],

        });
    });
    $(document).on('click', '#submit_essay', function(e) {
        e.preventDefault();
        let url;
        $('#submit_essay').html('Submiting...');
        $.ajax({
            url: "/guru/essay/add",
            method: 'POST',
            data: $('#essay_add').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.errors) {
                    swal("Error", "Data Wajib diisi", "error").then(function() {
                        $('#datatables_essay').DataTable().ajax.reload();
                        $('#submit_essay').html('Submit');

                    });
                } else if (data.success) {
                    swal("Success", "Data berhasil ditambah", "success").then(function() {
                        $('#datatables_essay').DataTable().ajax.reload();
                        $('#essay_add').trigger('reset');
                        $('#soal_essay').summernote('code', '');

                        $('#submit_essay').html('Submit');

                    });
                } else if (data.update) {
                    swal("Success", "Data berhasil dirubah", "success").then(function() {
                        $('#datatables_essay').DataTable().ajax.reload();
                        $('#essay_add').trigger('reset');
                        $('#soal_essay').summernote('code', '');

                        $('#submit_essay').html('Submit');

                    });
                }
            }
        })
    })
    $(document).on('click', '.edit_essay', function() {
        id = $(this).data('id');
        $.ajax({
            url: "/guru/essay/" + id + "/edit",
            dataType: 'json',
            success: function(data) {
                $('#soal_essay').summernote('code', data.data.soal);
                $('#hidden_essay').val(data.data.id);
            }
        });
    })

    //Delete Button
    $(document).on('click', '.delete_essay', function() {
        id = $(this).data('id');
        $('#konfirmasi-modal').modal('show');
    });
    //Delete

    // Delete
    $('#tombol-hapus').click(function() {
        $.ajax({
            url: "/guru/essay/" + id + "/delete",
            type: 'delete',
            beforeSend: function() {
                $('#tombol-hapus').text('Menghapus...');
            },
            success: function(data) {
                setTimeout(function() {
                    $('#konfirmasi-modal').modal('hide');
                    var oTable = $('#datatables_essay').dataTable();
                    oTable.fnDraw(false);
                });
                swal("Success", "Data berhasil dihapus", "success");
            }

        })
    });
</script>



@endsection