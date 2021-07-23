<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\Grup;
use App\Models\Model\GrupSiswa;
use App\Models\Model\Guru;
use App\Models\Model\Kelas;
use App\Models\Model\NilaiPilgan;
use App\Models\Model\Siswa;
use App\Models\Model\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelolaJawabanController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Jawaban';
        // $cek = Grup::find($request->id);

        // $data = GrupSiswa::get();
        $data = Ujian::where('guru_id', Session::get('id'))->get();
        // $data = Siswa::get();
        return view('guru.jawaban.index', compact('data', 'title'));
    }
    public function detailpilgan($id)
    {
        $title = 'Detail Jawaban';

        $siswa = Siswa::findOrFail($id);
        $data = NilaiPilgan::where('ujian_id', $id)->get();
        return view('guru.jawaban.detail', compact('title', 'data', 'siswa'));
    }
}
