<?php

namespace App\Http\Controllers\Backend\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Model\Kelas;
use App\Models\Model\KelolaNilai;
use App\Models\Model\NilaiEssay;
use App\Models\Model\NilaiPilgan;
use App\Models\Model\SiswaUjian;
use App\Models\Model\SoalPilgan;
use App\Models\Model\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaJawabUjianController extends Controller
{
    public function jawabpilgan(Request $request)
    {
        $get_jawab = explode('/', $request->get_jawab);
        $pilihan = $get_jawab[0];
        $id_detail_soal = $get_jawab[1];
        $id_siswa = $get_jawab[2];
        $detail_soal = SoalPilgan::find($id_detail_soal);

        $jawab = NilaiPilgan::where('no_soal_id', $id_detail_soal)->where('siswa_id', Session::get('id'))->first();
        if (!$jawab) {
            $jawab = new NilaiPilgan;
            $jawab->revisi = 0;
        } else {
            $jawab->revisi = $jawab->revisi + 1;
        }

        $jawab->no_soal_id = $id_detail_soal;
        $jawab->ujian_id = $detail_soal->ujian_id;
        $jawab->siswa_id = Session::get('id');
        $jawab->kelas_id = Session::get('kelas_id');
        $jawab->nama = Session::get('nama');

        $jawab->pilihan = $pilihan;

        $check_jawaban = SoalPilgan::where('id', $id_detail_soal)->where('kunci', $pilihan)->first();
        if ($check_jawaban) {
            $jawab->benar = 1;
            $jawab->salah = 0;
            $jawab->score = $detail_soal->skor;
        } else {
            $jawab->score = 0;
            $jawab->benar = 0;
            $jawab->salah = 1;
        }
        $jawab->status = 0;
        $jawab->save();
        return 1;
    }

    public function finishpilgan(Request $request, $id)
    {
        $title = ' Hasil Ujian/Latihan';

        $pilgan_benar = NilaiPilgan::where('ujian_id', $id)->where('siswa_id', Session::get('id'))->where('benar', '=', 1)->get();
        $pilgan_salah = NilaiPilgan::where('ujian_id', $id)->where('siswa_id', Session::get('id'))->where('salah', '=', 1)->get();
        $jumlah_pilgan = SoalPilgan::where('ujian_id', $id)->count();
        $soal = Ujian::where('id', $id)->first();
        $jumlah_skor = NilaiPilgan::where('ujian_id', $id)->where('siswa_id', Session::get('id'))->where('benar', '=', 1)->sum('score');
        $nilai = KelolaNilai::insert([

            'siswa_id' => Session::get('id'),
            'kelas_id' => Session::get('kelas_id'),
            'mapel_id' => $soal->mapel_id,
            'nilai' => $jumlah_skor,
            'jenis' => $soal->jenis,
            'guru_id' => $soal->guru_id,
        ]);
        return view('siswa.ujian.pilgan.finish', compact('soal', 'title', 'pilgan_benar', 'pilgan_salah', 'jumlah_pilgan', 'jumlah_skor'));
    }

    public function kirimpilgan(Request $request)
    {
        NilaiPilgan::where('ujian_id', $request->ujian_id)->where('siswa_id', Session::get('id'))->update(['status' => 1]);
    }
    //Essay
    public function jawabessay(Request $request)
    {
        if ($request->jawab_essay == '' || $request->jawab_essay == null) {
            return '';
        }
        $check_jawaban = NilaiEssay::where('siswa_id', Session::get('id'))->where('id_detail_soal_essay', $request->ujian_id_essay)->first();
        if (!$check_jawaban) {
            $save = new NilaiEssay;
            $save->id_detail_soal_essay = $request->ujian_id_essay;
            $save->siswa_id = Session::get('id');
            $save->score = 0;
            $save->status = 0;
        } else {
            $save = $check_jawaban;
        }
        $save->ujian_id = $request->id;

        $save->jawab = $request->jawab_essay;
        if ($save->save()) {
            return 1;
        }
    }
    public function kirimessay(Request $request)
    {
        NilaiEssay::where('ujian_id', $request->ujian_id)->where('siswa_id', Session::get('id'))->update(['status' => 1]);
    }
    public function finishessay(Request $request, $id)
    {
        $title = 'Hasil Ujian/Latihan';
        $soal = Ujian::where('id', $id)->first();

        $nilai = NilaiEssay::where('nilai_essay.siswa_id', Session::get('id'))
            ->where('status', 1)
            ->join('soal_essay', 'nilai_essay.id_detail_soal_essay', '=', 'soal_essay.id')
            ->select('soal_essay.soal as nama_soal', 'nilai_essay.*')
            ->get();
        return view('siswa.ujian.essay.finish', compact('soal', 'nilai', 'title'));
    }
}
