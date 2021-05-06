<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\Grup;
use App\Models\Model\GrupSiswa;
use App\Models\Model\Guru;
use App\Models\Model\Kelas;
use App\Models\Model\KelolaNilai;
use App\Models\Model\Mapel;
use App\Models\Model\Siswa;
use App\Models\Model\Tugas;
use App\Models\Model\TugasJawaban;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TugasController extends Controller
{
    public function index()
    {
        $title = 'Tugas';
        $grup = Grup::where('guru_id', Session::get('id'))->get();
        // $cek = Grup::whereUserId(Auth::user()->id)->count();
        $data = Tugas::where('guru_id', Session::get('id'))->get();


        return view('guru.tugas.index', compact('title', 'data', 'grup'));
    }
    public function create()
    {
        $title = 'Tugas';
        $kelas = Kelas::get();
        $grup = Grup::where('guru_id', Session::get('id'))->get();
        $data = Tugas::where('guru_id', Session::get('id'))->get();
        return view('guru.tugas.create', compact('title', 'data', 'grup', 'kelas'));
    }
    public function store(Request $request)
    {
        $messages = [

            'judul.required' => 'Judul Wajib di Isi',
            'batas_waktu.required' => 'Batas Waktu Wajib di Isi',
            'deskripsi.required' => 'Deskripsi Wajib di Isi',
            'kelas_id.required' => 'Kelas Wajib di Isi',
            'isi.required' => 'Isi Tugas Wajib di Isi',
            'grup_id.required' => 'Grup Wajib di Isi',

        ];
        //dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'batas_waktu' => 'required',
            'isi' => 'required',
            'deskripsi' => 'required',
            'grup_id' => 'required',
            'kelas_id' => 'required',

        ], $messages);
        $data['guru_id'] = Session::get('id');
        $data['grup_id'] = $request->grup_id;
        $data['kelas_id'] = $request->kelas_id;
        $data['judul'] = $request->judul;
        $isi = $request->isi;
        if ($request->jenis == "file") {
            $request->validate(
                [
                    'isi' => 'file|mimes:pdf,doc,docx,png',
                ]
            );
            $isi = $request->file('isi')->store('public/tugas');
        }
        $data['jenis'] = $request->jenis;
        $data['isi'] = $isi;
        $data['batas_waktu'] = $request->batas_waktu;
        $data['deskripsi'] = $request->deskripsi;
        $data['created_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        Tugas::create($data);

        return redirect()->back()->with('sukses', 'Tugas Berhasil ditambah');
    }
    public function delete($id)
    {
        try {
            $data = Tugas::find($id);
            $data->delete();
            return redirect()->back()->with('sukses', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('gagal', 'Data gagal dihapus');
        }
    }
    public function edit($id)
    {
        $title = 'Edit Data Tugas';
        $kelas = Kelas::get();
        $guru = Guru::get();
        $grup = Grup::where('guru_id', Session::get('id'))->get();
        $data = Tugas::find($id);
        return view('guru.tugas.edit', compact('title', 'data', 'guru', 'grup', 'kelas'));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'unique' => ':attribute sudah terdaftar!',
            'mimes' => ':attribute berformat PDF, DOC, DOCX'
        ];
        //dd($request->all());
        $this->validate($request, [
            'judul' => 'required|max:50',
            'grup_id' => 'required',
            'kelas_id' => 'required',
            'batas_waktu' => 'required',
            'deskripsi' => 'nullable',

        ], $messages);
        $isi = $request->isi;
        $cek = Tugas::find($id);
        if ($cek->jenis == "file") {
            $request->validate(
                [
                    'isi' => 'file|mimes:pdf,doc,docx,png',
                ]
            );
            $isi = $request->file('isi')->store('public/tugas');
        }
        $data['judul'] = $request->judul;
        $data['grup_id'] = $request->grup_id;
        $data['kelas_id'] = $request->kelas_id;
        $data['isi'] = $isi;
        $data['batas_waktu'] = $request->batas_waktu;
        $data['deskripsi'] = $request->deskripsi;
        $data['updated_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        Tugas::where('id', $id)->update($data);
        return redirect('guru/tugas')->with('sukses', 'Data Berhasil Dirubah');
    }
    public function show($id)
    {
        $title = 'Detail Tugas';
        $data = Tugas::findOrFail($id);
        $jwb = TugasJawaban::where('tugas_id', $id)->get();

        return view('guru.tugas.show', compact('title', 'data', 'jwb'));
    }
    public function terimajawaban($id)
    {
        $data = TugasJawaban::findOrFail($id);
        TugasJawaban::where('id', $id)->update(['status' => 2]);
        return redirect()->back()->with('sukses', 'Tugas Berhasil diterima');
    }
    public function nilaijawaban(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'unique' => ':attribute sudah terdaftar!',
            'mimes' => ':attribute berformat PDF, DOC, DOCX',
            'integer' => ':atribut berformat angka',
        ];
        //dd($request->all());
        $this->validate($request, [
            'score' => 'required|integer',
        ], $messages);
        if ($request->isMethod('post')) {
            $data = TugasJawaban::findOrFail($id);
            TugasJawaban::where('id', $id)->update(['score' => $request->score, 'status' => 3,]);
            $siswa_id = $data->siswa_id;
            $kelas_id = $data->tugas->kelas_id;
            $mapel_id = $data->tugas->grup->mapel_id;
            $jdl = $data->tugas->judul;
            $nilai = KelolaNilai::insert([
                'siswa_id' => $siswa_id,
                'kelas_id' => $kelas_id,
                'mapel_id' => $mapel_id,
                'nilai' => $request->score,
                'jenis' => 'tugas',
                'guru_id' => Session::get('id'),

            ]);
        }
        return redirect()->back()->with('sukses', 'Tugas Berhasil diterima');
    }
}
