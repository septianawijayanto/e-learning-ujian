<?php

namespace App\Http\Controllers\Backend\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Model\DistribusiSoal;
use App\Models\Model\GrupSiswa;
use App\Models\Model\Siswa;
use App\Models\Model\SiswaUjian;
use App\Models\Model\SoalEssay;
use App\Models\Model\SoalPilgan;
use App\Models\Model\Ujian;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaUjianController extends Controller
{
    public function index()
    {
        $title = 'Ujian';
        $cek = GrupSiswa::where('siswa_id', Session::get('id'))->count();
        $siswa = Siswa::where('id', Session::get('id'))->first();
        $data = DistribusiSoal::join('ujian', 'distribusi_soal.ujian_id', '=', 'ujian.id')
            ->select('distribusi_soal.*', 'ujian.paket as nama_paket', 'ujian.jenis as jenis_paket', 'ujian.deskripsi as deskripsi')
            ->where('distribusi_soal.kelas_id', Session::get('kelas_id'))
            ->orderBy('created_at', 'desc')->get();
        return view('siswa.ujian.index', compact('siswa', 'data', 'title', 'cek'));
    }
    public function detail(Request $request, $id)
    {
        $title = 'Detail Ujian';
        SiswaUjian::create([
            'siswa_id' => Session::get('id'),
            'waktu_mulai' => now(),
        ]);
        $check_soal = DistribusiSoal::where('ujian_id', $id)->where('kelas_id', Session::get('kelas_id'))->first();
        if ($check_soal) {
            $soal = Ujian::where('id', $id)->first();
            $essay = SoalEssay::where('ujian_id', '=', $id)->count();
            $soals = SoalPilgan::where('ujian_id', '=', $id)->count();
            return view('siswa.ujian.detail', compact('essay', 'soals', 'soal', 'title'));
        } else {
            return redirect()->back();
        }
    }
    public function mulai(Request $request, $id)
    {
        $title = 'Soal';

        if ($request->ajax()) {
            $soal = Ujian::where('id', $id)->first();
            $pilgan = SoalPilgan::where('ujian_id', $id)->paginate(1);
            $essay = SoalEssay::where('ujian_id', $id)->paginate(1);
            if (number_format($essay->count()) != 0) {
                return view('siswa.ujian.essay', compact('soal', 'pilgan', 'essay'));
            } else {
                return view('siswa.ujian.pilgan', compact('soal', 'pilgan', 'essay'));
            }
        }
        $mulai = SiswaUjian::where('siswa_id', Session::get('id'))->first();
        $soal = Ujian::where('id', $id)->first();
        $pilgan = SoalPilgan::where('ujian_id', $id)->paginate(1);
        $essay = SoalEssay::where('ujian_id', $id)->paginate(1);
        return view('siswa.ujian.mulai', compact('soal', 'pilgan', 'essay', 'title', 'mulai'));
    }
}
