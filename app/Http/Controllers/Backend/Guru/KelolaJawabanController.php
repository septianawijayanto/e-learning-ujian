<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelolaJawabanController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Jawaban';
        $jawaban = Guru::join('nilai_pilgan', 'guru.id', 'nilai_pilgan.siswa_id')
            ->where('nilai_pilgan.status', 1)
            ->join('ujian', 'nilai_pilgan.ujian_id', '=', 'ujian.id')
            ->join('siswa', 'nilai_pilgan.siswa_id', '=', 'siswa.id')
            ->select('guru.*', 'ujian.jenis as jenis', 'siswa.nama')
            ->where('ujian.guru_id', Session::get('id'))
            ->get();

        $essay = Guru::join('nilai_essay', 'guru.id', 'nilai_essay.siswa_id')
            ->where('nilai_essay.status', 1)
            ->join('ujian', 'nilai_essay.ujian_id', '=', 'ujian.id')
            ->join('siswa', 'nilai_essay.siswa_id', '=', 'siswa.id')
            ->select('guru.*', 'ujian.jenis as jenis', 'siswa.nama')
            ->where('ujian.guru_id', Session::get('id'))
            ->get();
        return view('guru.jawaban.index', compact('jawaban', 'essay', 'title'));
    }
}
