<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\Grup;
use App\Models\Model\GrupSiswa;
use App\Models\Model\Kelas;
use App\Models\Model\KelolaNilai;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelolaNilaiController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Kelola Nilai';

        $data = Kelas::where('guru_id', Session::get('id'))->get();

        return view('guru.nilai.index', compact('title', 'data'));
    }
    public function delete($id)
    {

        $data = KelolaNilai::find($id);
        $data->delete();
        return \redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
    public function cetak(Request $request)
    {
        $title = 'Nilai';
        $dt = KelolaNilai::query();
        $tgl = date('d F Y');
        if ($request->get('jenis')) {
            if ($request->get('jenis') == 'ujian') {
                $dt->where('jenis', 'ujian');
            } elseif ($request->get('jenis') == 'latihan') {
                $dt->where('jenis', 'latihan');
            } elseif ($request->get('jenis') == 'tugas') {
                $dt->where('jenis', 'tugas');
            }
        }

        $data = $dt->where('guru_id', Session::get('id'))->get();

        $pdf = PDF::loadView('guru.nilai.cetak', compact('data', 'tgl', 'title'))->setPaper('a4', 'Landscape');
        return $pdf->stream();
    }
    public function detail($id)
    {
        $title = 'Detail Nilai';
        $data = KelolaNilai::where('kelas_id', $id)->where('guru_id', Session::get('id'))->get();
        $kelas = Kelas::findOrFail($id);
        return view('guru.nilai.detail', compact('data', 'title', 'kelas'));
    }
}
