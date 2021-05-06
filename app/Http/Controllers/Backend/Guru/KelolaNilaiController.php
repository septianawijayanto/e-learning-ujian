<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\Grup;
use App\Models\Model\KelolaNilai;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelolaNilaiController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Kelola Nilai';

        $data = KelolaNilai::where('guru_id', Session::get('id'))->get();


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

        $dt = KelolaNilai::query();

        if ($request->get('jenis')) {
            if ($request->get('jenis') == 'ujian') {
                $dt->where('jenis', 'ujian');
            } elseif ($request->get('jenis') == 'latihan') {
                $dt->where('jenis', 'latihan');
            } elseif ($request->get('jenis') == 'tugas') {
                $dt->where('jenis', 'tugas');
            }
        }

        $data = $dt->get();

        $pdf = PDF::loadView('guru.nilai.cetak', compact('data'))->setPaper('a4', 'Landscape');
        return $pdf->stream();
    }
}
