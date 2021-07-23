@extends('siswa.ujian.layouts.master')
@section('konten')

<div class="row">
    <div class="col-md-12">
        <div class="card-body">
            <h4> Soal </h4>

            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Waktu Mulai</h5>
                            <div>{{$mulai->waktu_mulai}}</div>
                            <h6 class="card-subtitle mb-2 text-muted">waktu kamu tersisa:</h6>
                            <div id="sisa" data-timer=""></div> -->
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Waktu</h5>
                            <h6 class="card-subtitle mb-2 text-muted">waktu kamu tersisa:</h6>
                            <div id="time" data-timer="<?= $soal->waktu * 60 ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    <div id="table_data">
                        @if(number_format($essay->count()) != 0)
                        @include('siswa.ujian.essay.essay')
                        @else
                        @include('siswa.ujian.pilgan.pilgan')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<style type="text/css">
    .jawab {
        cursor: pointer;
        margin: 0 0 7px 0;

    }

    .dijawab {
        background: #1980d4;
        color: #fff;
        padding: 5px 10px;
        border-radius: 3px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {


    })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#time").TimeCircles({
        time: {
            Days: {
                show: false
            },
            Hours: {
                show: true
            },
            Minutes: {
                show: true,
                color: '#4D8DC1'
            },
            Seconds: {
                show: true,
                color: '#4D8DC1'
            },
        }
    }).addListener(countdownComplete);

    function countdownComplete(unit, value, total) {
        if (total <= 0) {
            // $(".stop").click(function(){ $(".example.stopwatch").TimeCircles().stop(); });
            $('#time').TimeCircles().stop();
            alert("Time's Up!");
            $(this).fadeOut('slow').replaceWith("<h2>Time's Up!</h2>");
            var $this = $(this);
            var ujian_id = $this.attr('data-id');
            $.ajax({
                type: "POST",
                url: "/siswa/ujian/selesai",
                data: {
                    ujian_id: ujian_id
                },
                success: function(data) {
                    window.location.href = "{{ url('/siswa/ujian/'.$soal->id.'/finish-pilgan') }}";
                }
            })
        }
    }

    $(document).on('click', ".jawab", function() {
        var $this = $(this);
        var get_jawab = $this.attr('data-jawab');
        var ujian_id = $this.attr('data-id');
        var paket_soal = $this.attr('soal-id');
        var dataJawabs = $(this).data('data-jawabs');
        $('#nav' + ujian_id).find('a').css({
            "background-color": "#1980d4",
            "color": "#fff"
        });
        // console.log(ujian_id);
        $(".jawab").css({
            "background-color": "#fff",
            "color": "#000",
            "padding": "0",
            "border-radius": "0"
        });

        $this.css({
            "background-color": "#1980d4",
            "color": "#fff",
            "padding": "5px 10px",
            "border-radius": "3px"
        });

        $.ajax({
            type: "POST",
            url: "{{ url('/siswa/ujian/jawab-pilgan') }}",
            data: {
                get_jawab: get_jawab
            },
            success: function(data) {}
        })

    });

    $(document).on('click', '#simpan-essay', function(e) {
        e.preventDefault();
        const jawab_essay = $("#jawab_essay").val();
        const id = $('#hidden_id').val();
        const ujian_id_essay = $(this).data('id');
        $.ajax({
            type: "POST",
            url: "/siswa/ujian/jawab-essay",
            data: {
                jawab_essay: jawab_essay,
                ujian_id_essay: ujian_id_essay,
                id: id,

            },

            success: function(data) {
                console.log(data);
                if (data == 1) {
                    console.log(data);
                    $("#notif-essay").html('Jawaban berhasil disimpan.').show();
                }
            }
        })
    });

    $(document).ready(function() {

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });
        let id;



        function fetch_data(page) {
            id = $('#hidden_id').val();
            $.ajax({
                url: "/siswa/ujian/mulai/" + id + "?page=" + page,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }

    });

    $(document).on('click', '#kirim', function(event) {
        event.preventDefault();
        $('#confirm').html(`
        <pSetelah mengirimkan jawaban, kamu tidak bisa kembali memeriksa jawaban.<p>
        <button type="button" class="btn" id="batal" style="background-image: linear-gradient(to right, #f31515 , #c12704); border: none; color: #fff;"><i class="fa fa-ban" aria-hidden="true"></i> Tidak! Saya Mau Cek Lagi.</button>
        <button type="button" class="btn" id="kirim-jawaban" data-id="{{ $soal->id }}" style="background-image: linear-gradient(to right, #1523f3 , #0495c1); border: none; color: #fff;"><i class="fa fa-check-circle" aria-hidden="true"></i> Iya! Saya Kirim Jawaban Saya Sekarang.</button>
        `).show();
    });

    $(document).on('click', '#batal', function() {
        $('#confirm').hide();
    });

    $(document).on('click', '#kirim-jawaban', function() {
        var $this = $(this);
        var ujian_id = $this.attr('data-id');
        $.ajax({
            type: "POST",
            url: "/siswa/ujian/selesai",
            data: {
                ujian_id: ujian_id
            },
            success: function(data) {
                window.location.href = "{{ url('siswa/ujian/'.$soal->id.'/finish-pilgan') }}";
            }
        })
    });
    $(document).on('click', '#kirim_essay', function(event) {
        event.preventDefault();
        $('#confirm').html(`
        <pSetelah mengirimkan jawaban, kamu tidak bisa kembali memeriksa jawaban.<p>
        <button type="button" class="btn" id="batal" style="background-image: linear-gradient(to right, #f31515 , #c12704); border: none; color: #fff;"><i class="fa fa-ban" aria-hidden="true"></i> Tidak! Saya Mau Cek Lagi.</button>
        <button type="button" class="btn" id="kirim-jawaban_essay" data-id="{{ $soal->id }}" style="background-image: linear-gradient(to right, #1523f3 , #0495c1); border: none; color: #fff;"><i class="fa fa-check-circle" aria-hidden="true"></i> Iya! Saya Kirim Jawaban Saya Sekarang.</button>
        `).show();
    });


    $(document).on('click', '#batal_essay', function() {
        $('#confirm').hide();
    });

    $(document).on('click', '#kirim-jawaban_essay', function() {
        var $this = $(this);
        var ujian_id = $this.attr('data-id');
        $.ajax({
            type: "POST",
            url: "/siswa/ujian/selesai-essay",
            data: {
                ujian_id: ujian_id
            },
            success: function(data) {
                window.location.href = "{{ url('/siswa/ujian/'.$soal->id.'id}/finish-essay') }}";
            }
        })
    });
</script>
@endsection