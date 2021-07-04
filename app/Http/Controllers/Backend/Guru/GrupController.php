<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\Grup;
use App\Models\Model\GrupAktivitas;
use App\Models\Model\GrupMateri;
use App\Models\Model\GrupSiswa;
use App\Models\Model\Kelas;
use App\Models\Model\Mapel;
use App\Models\Model\Materi;
use App\Models\Model\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class GrupController extends Controller
{
    public function index()
    {
        $title = 'Data Grup';
        $kode = Str::random(5);

        $kelas = Kelas::get();
        $mapel = Mapel::get();
        $data = Grup::where('guru_id', Session::get('id'))->get();
        return view('guru.grup.index', compact('title', 'data', 'mapel', 'kode', 'kelas'));
    }
    public function store(Request $request)
    {
        $messages = [
            'kelas_id.required' => 'Kelas Wajib di Isi',
            'kode.required' => 'Kode Wajib di Isi',
            'mapel_id.required' => 'Mapel Wajib di Isi',
        ];
        //dd($request->all());
        $this->validate($request, [
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'kode' => 'required',
            'deskripsi' => 'nullable',

        ], $messages);
        $request->request->add(['guru_id' => Session::get('id')]);
        $data = Grup::create($request->all());
        return redirect()->back()->with('sukses', 'Data Behasili ditambah');
    }
    public function edit($id)
    {
        $title = 'Edit Grup';
        $data = Grup::find($id);
        $kelas = Kelas::get();
        $mapel = Mapel::get();
        return view('guru.grup.edit', compact('data', 'title', 'mapel', 'kelas'));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'kelas_id.required' => 'Kelas Wajib di Isi',
            'kode.required' => 'Kode Wajib di Isi',
            'mapel_id.required' => 'Mapel Wajib di Isi',
        ];
        //dd($request->all());
        $this->validate($request, [
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'deskripsi' => 'nullable',

        ], $messages);
        $data['kelas_id'] = $request->kelas_id;
        $data['mapel_id'] = $request->id;
        // $data['kode'] = $request->kode;
        $data['deskripsi'] = $request->deskripsi;
        Grup::Where('id', $id)->update($data);
        return redirect('guru/grup')->with('sukses', 'Data Behasili diupdate');
    }
    public function delete($id)
    {
        try {
            $data = Grup::find($id);
            $data->delete();
            return \redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return \redirect()->back()->with('gagal', 'Data Berelasi di tabel lain');
        }
    }
    public function detail($id)
    {
        $title = "Daftar Kelas";
        $data = Grup::findOrFail($id);
        $materi = Materi::whereGuruId(Session::get('id'))->get();
        $user = Siswa::all();
        $grupaktivitas = GrupAktivitas::orderBy('created_at', 'desc')->get();
        return view('guru.grup.detail.index', compact('data', 'title', 'materi', 'user', 'grupaktivitas'));
    }
    public function matericreate(Request $request)
    {
        $messages = [

            'judul.required' => 'Judul Wajib di Isi',
            'materi_id.required' => 'Materi Wajib di Isi',

        ];
        //dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'materi_id' => 'required',


        ], $messages);
        $data['guru_id'] = Session::get('id');
        $data['grup_id'] = $request->id;
        $data['materi_id'] = $request->materi_id;
        $data['judul'] = $request->judul;
        $data['status'] = '1';
        GrupMateri::create($data);
        return redirect()->back()->with('sukses', 'Data Berhasil disimpan');
    }
    public function materidelete($id)
    {
        $data = GrupMateri::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil dihapus');
    }
    public function materidetail($id)
    {
        $data = GrupMateri::findOrFail($id);
        $title = "Detail Materi";
        return view('guru.grup.detail.detail', compact('data', 'title'));
    }
    public function siswacreate(Request $request)
    {
        $messages = [
            'username.required' => 'Username Wajib di Isi',
        ];
        //dd($request->all());
        $this->validate($request, [
            'username' => 'required',
        ], $messages);

        $siswa = Siswa::whereUsername($request->username)->first();
        if ($siswa == null) {
            return redirect()->back()->with('gagal', 'Data Siswa Tidak ditemukan');
        }


        $grupsiswa = GrupSiswa::whereGrupId($request->id)->whereSiswaId($siswa->id)->first();
        if ($grupsiswa != null) {
            return redirect()->back()->with('gagal', 'Siswa Sudah bergabung digrup yang sama');
        }
        $cek = Grup::where('kelas_id', $siswa->kelas_id)->find($request->id);
        if ($cek < '1') {
            return redirect()->back()->with('peringatan', 'Grup ini bukan grup kelas Anda');
        }
        $data['siswa_id'] = $siswa->id;
        $data['grup_id'] = $request->id;
        $data['deskripsi'] = '';
        $data['status'] = '1';
        $data['deskripsi'] = 'Di Undang';
        GrupSiswa::create($data);
        return redirect()->back()->with('sukses', 'Siswa Berhasil ditambah');
    }
    public function siswadelete($id)
    {
        $data = GrupSiswa::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil dihapus');
    }
}
