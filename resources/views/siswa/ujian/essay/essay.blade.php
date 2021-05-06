<div class="card">
    <div class="card-body">
        <form id="form_essay">
            @csrf
            <h5 class="card-title">Pertanyaan</h5>
            <input type="hidden" name="hidden_id" id="hidden_id" value="<?= $soal->id ?>">

            <?php

            use App\Models\Model\NilaiEssay;
            use Illuminate\Support\Facades\Session;

            $no = 0;

            ?>

            @foreach($essay as $essays)
            <?php
            if (NilaiEssay::where('id_detail_soal_essay', $essays->id)->where('siswa_id', Session::get('id'))->get()) {
                $jawab_siswa = NilaiEssay::where('id_detail_soal_essay', $essays->id)->where('siswa_id', Session::get('id'))->first();
            } else {
                $jawab_siswa = '';
            }
            ?>
            <div class="alert alert-info alert-dismissible" id="notif-essay" style="display: none"></div>


            <h5 class="card-subtitle mb-2 mt-3 text-muted"><?php $soal = str_replace("<p>", "", $essays->soal);
                                                            $soal = str_replace("</p>", "", $soal);
                                                            echo $soal; ?></h5>
            <div class="form-group ">
                <!-- <label for="exampleFormControlTextarea1">Deskripsi</label> -->
                <textarea name="jawab_essay" class="form-control" id="jawab_essay" rows="4">
            @if($jawab_siswa == null)
            @else
            {{ $jawab_siswa->jawab }}
            @endif</textarea>
            </div>

            <button id="simpan-essay" class="btn btn-primary mt-3" data-id="{{ $essays->id }}">Simpan</button>


            @endforeach

            <button class="btn btn-success float-right mt-5" id="kirim_essay">SELESAI</button>

        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Navigasi Soal</h5>
        {!! $essay->links() !!}

        <div id="confirm" style="display: none; margin: 15px 0; border: solid thin #aaa; padding: 10px;"></div>


    </div>
</div>
</div>
@push('page-scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@endpush