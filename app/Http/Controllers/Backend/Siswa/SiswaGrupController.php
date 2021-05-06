<?php

namespace App\Http\Controllers\Backend\Siswa;

use App\Http\Controllers\Controller;

use App\Models\Model\Grup;
use App\Models\Model\GrupAktivitas;
use App\Models\Model\GrupMateri;
use App\Models\Model\GrupSiswa;
use App\Models\Model\Kelas;
use App\Models\Model\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaGrupController extends Controller
{
    public function store(Request $request)
    {
        $grup = Grup::whereKode($request->kode)->first();
        if ($grup == null) {
            return redirect()->back()
                ->with('gagal', 'grup tidak tersedia');
        }
        $grupsiswa = GrupSiswa::whereGrupId($grup->id)
            ->whereSiswaId(Session::get('id'))->first();
        if ($grupsiswa != null) {
            return redirect()->back()
                ->with('info', 'Anda sudah bergabung digrup ini');
        }
        $cek = Grup::where('kelas_id', Session::get('kelas_id'))->count();
        if ($cek < 1) {
            return redirect()->back()->with('peringatan', 'Grup ini bukan grup kelas Anda');
        }
        GrupSiswa::create([
            'grup_id' => $grup->id,
            'siswa_id' => Session::get('id'),
            'status' => 1,
            'deskripsi' => 'Gabung Sendiri',
        ]);
        return redirect()->back()->with('sukses', 'Anda sudah bergabung digrup ' . $grup->kelas->kelas . " " . $grup->mapel->mapel);
    }
    public function index()
    {
        $title = 'Grup Saya';
        $data = GrupSiswa::where('siswa_id', Session::get('id'))->get();
        return view('siswa.grup.index', compact('data', 'title'));
    }
    public function detail($id)
    {
        // dd($id);
        $grupsiswa = GrupSiswa::whereSiswaId(Session::get('id'))->whereGrupId($id)
            ->whereStatus(1)->firstOrFail();

        GrupAktivitas::create([
            'grup_id' => $id,
            'siswa_id' => Session::get('id'),
            'deskripsi' => 'Melihat Daftar Materi Grup ' . $grupsiswa->grup->kelas->kelas,
        ]);
        $title = 'Materi';

        $data = GrupMateri::whereGrupId($id)->get();

        return view('siswa.grup.detail.index', compact('data', 'title', 'grupsiswa'));
    }
    public function show($id)
    {
        $title = 'Detail Materi';
        $data = GrupMateri::whereMateriId($id)->first();
        GrupAktivitas::create([
            'grup_id' => $data->grup_id,
            'siswa_id' => Session::get('id'),
            'deskripsi' => 'Melihat Detail Materi ' . $data->materi->judul,
        ]);
        return view('siswa.grup.detail.show', compact('data', 'title'));
    }
    public function keluar($id)
    {
        $data = GrupSiswa::findOrFail($id);
        $data->delete();
        GrupAktivitas::create([
            'grup_id' => $data->grup_id,
            'siswa_id' => Session::get('id'),
            'deskripsi' => 'Keluar dari grup',
        ]);
        return redirect()->back()->with('sukses', 'Berhasil keluar grup');
    }
}
