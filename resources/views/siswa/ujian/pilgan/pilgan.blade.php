<div class="card">
    <div class="card-body">
        <form id="pilgan-form">
            @csrf
            <h5 class="card-title">Pertanyaan</h5>
            <div class="form-group">
                <input type="hidden" name="hidden_id" class="form-control" id="hidden_id" placeholder="Input jenis" value="{{$soal->id}}">
            </div>
            <!-- <input type="text" name="hidden_id" id="hidden_id" value="<?= $soal->id ?>"> -->

            <?php



            $no = 0; ?>

            @foreach($pilgan as $pilgans)

            <?php
            if (App\Models\Model\NilaiPilgan::where('no_soal_id', $pilgans->id)->where('siswa_id', Illuminate\Support\Facades\Session::get('id'))->get()) {
                $jawab_siswa = App\Models\Model\NilaiPilgan::where('no_soal_id', $pilgans->id)->where('siswa_id', Illuminate\Support\Facades\Session::get('id'))->first();
            } else {
                $jawab_siswa = '';
            }
            $pil_a = str_replace("<p>", "", $pilgans->pil_a);
            $pil_a = str_replace("</p>", "", $pil_a);
            $pil_b = str_replace("<p>", "", $pilgans->pil_b);
            $pil_b = str_replace("</p>", "", $pil_b);
            $pil_c = str_replace("<p>", "", $pilgans->pil_c);
            $pil_c = str_replace("</p>", "", $pil_c);
            $pil_d = str_replace("<p>", "", $pilgans->pil_d);
            $pil_d = str_replace("</p>", "", $pil_d);
            ?>

            <h6 class="card-subtitle mb-2 mt-3 text-muted">{!! $pilgans->soal !!}</h6>
            <?php if ($pilgans->pil_a) { ?>
                <div class="jawab <?php if ($jawab_siswa == null) {
                                    } else {
                                        echo ($jawab_siswa->pilihan == 'A' ? 'dijawab' : '');
                                    } ?>  " soal-id="{{ $pilgans->ujian_id }}" data-id="{{ $pilgans->id }}" data-jawab="{{ 'A/'.$pilgans->id.'/'.Session::get('id') }}">
                    <table width="100%">
                        <tr>
                            <td width="15px" valign="top"><span>A.</span></td>
                            <td valign="top" class="pilihan">{!! $pil_a !!}</td>
                        </tr>
                    </table>
                </div>
            <?php } ?>
            <?php if ($pilgans->pil_b) { ?>
                <div class="jawab <?php if ($jawab_siswa == null) {
                                    } else {
                                        echo ($jawab_siswa->pilihan == 'B' ? 'dijawab' : '');
                                    } ?>" soal-id="{{ $pilgans->ujian_id }}" data-id="{{ $pilgans->id }}" data-jawab="{{ 'B/'.$pilgans->id.'/'.Session::get('id') }}">
                    <table width="100%">
                        <tr>
                            <td width="15px" valign="top"><span>B.</span></td>
                            <td valign="top" class="pilihan">{!! $pil_b !!}</td>
                        </tr>
                    </table>
                </div>
            <?php } ?>
            <?php if ($pilgans->pil_c) { ?>
                <div class="jawab <?php if ($jawab_siswa == null) {
                                    } else {
                                        echo ($jawab_siswa->pilihan == 'C' ? 'dijawab' : '');
                                    } ?>" soal-id="{{ $pilgans->ujian_id }}" data-id="{{ $pilgans->id }}" data-jawab="{{ 'C/'.$pilgans->id.'/'.Session::get('id') }}">
                    <table width="100%">
                        <tr>
                            <td width="15px" valign="top"><span>C.</span></td>
                            <td valign="top" class="pilihan">{!! $pil_c !!}</td>
                        </tr>
                    </table>
                </div>
            <?php } ?>
            <?php if ($pilgans->pil_d) { ?>
                <div class="jawab <?php if ($jawab_siswa == null) {
                                    } else {
                                        echo ($jawab_siswa->pilihan == 'D' ? 'dijawab' : '');
                                    } ?>" soal-id="{{ $pilgans->ujian_id }}" data-id="{{ $pilgans->id }}" data-jawab="{{ 'D/'.$pilgans->id.'/'.Session::get('id') }}">
                    <table width="100%">
                        <tr>
                            <td width="15px" valign="top"><span>D.</span></td>
                            <td valign="top" class="pilihan">{!! $pil_d !!}</td>
                        </tr>
                    </table>
                </div>
            <?php } ?>

            @endforeach

            <button class="btn btn-success float-right " id="kirim">SELESAI</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Navigasi Soal</h5>
        <!-- {{ $pilgan->links('vendor.pagination.tailwind') }} -->
        {{ $pilgan->links() }}

        <div id="confirm" style="display: none; margin: 15px 0; border: solid thin #aaa; padding: 10px;"></div>
    </div>
</div>