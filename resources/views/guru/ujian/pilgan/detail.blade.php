@extends('guru.layouts.master')
@section('konten')
<div class="row">
    <div class="col-12">
        <?php $no = 0; ?>
        @foreach($data as $soal)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pertanyaan</h5>

                {!! $soal->soal !!}

                <p><input type="radio" name="pilihan" id="pil_a" value="A">
                    <label for="pil_a">
                        A. <?php $pila = str_replace("<p>", "", $soal->pil_a);
                            $pila = str_replace("</p>", "", $pila);
                            echo $pila; ?>
                    </label>
                </p>
                <p><input type="radio" name="pilihan" value="B">
                    <label for="pil_b">
                        B. <?php $pilb = str_replace("<p>", "", $soal->pil_b);
                            $pilb = str_replace("</p>", "", $pilb);
                            echo $pilb; ?>
                    </label>
                </p>
                <p><input type="radio" name="pilihan" value="C">
                    <label for="pil_c">
                        C. <?php $pilc = str_replace("<p>", "", $soal->pil_c);
                            $pilc = str_replace("</p>", "", $pilc);
                            echo $pilc; ?>
                    </label>
                </p>
                <p><input type="radio" name="pilihan" id="pil_d" value="D">
                    <label for="pil_d">
                        D. <?php $pild = str_replace("<p>", "", $soal->pil_d);
                            $pild = str_replace("</p>", "", $pild);
                            echo $pild; ?>
                    </label>
                </p>
                <hr>
                <button type="button" class="btn btn-danger" onclick="self.history.back()">Kembali</button>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection