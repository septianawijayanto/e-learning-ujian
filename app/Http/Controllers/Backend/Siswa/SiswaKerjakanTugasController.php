<?php

namespace App\Http\Controllers\Backend\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Model\Grup;
use App\Models\Model\GrupSiswa;
use App\Models\Model\Tugas;
use App\Models\Model\TugasJawaban;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaKerjakanTugasController extends Controller
{
    public function index()
    {
        $title = 'Data Tugas';
        $cek = GrupSiswa::where('siswa_id', Session::get('id'))->count();
        $data = Tugas::where('kelas_id', Session::get('kelas_id'))->get();
        return view('siswa.tugas.index', compact('title', 'data', 'cek'));
    }
    public function show($id)
    {
        $title = 'Detail Tugas';
        $data = Tugas::findOrFail($id);
        $jwb = TugasJawaban::where('siswa_id', Session::get('id'))->where('tugas_id', $id)->get();

        return view('siswa.tugas.show', compact('title', 'data', 'jwb'));
    }
    public function kerjakan($id)
    {
        $title = 'Kerjakan Tugas';
        $data = Tugas::findOrFail($id);
        $cek = TugasJawaban::where('tugas_id', $id)->where('siswa_id', Session::get('id'))->count();
        $tgs = TugasJawaban::where('tugas_id', $id)->where('siswa_id', Session::get('id'))->first();
        return view('siswa.tugas.kerjakan', compact('title', 'data', 'tgs', 'cek'));
    }
    public function simpan(Request $request)
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
            'isi' => 'required',
            'deskripsi' => 'required',

        ], $messages);
        $telat = Carbon::now();
        $tugas = Tugas::find($request->id);
        if ($telat > $tugas->batas_waktu) {
            return redirect()->back()->with('gagal', 'Batas Waktu Pengumpulan Habis!');
        }

        $isi = $request->isi;
        if ($request->jenis == "file") {
            $request->validate(
                [
                    'isi' => 'file|mimes:pdf,doc,docx,png',
                ]
            );
            $isi = $request->file('isi')->store('public/tugas');
        }
        $data['tugas_id'] = $request->id;
        $data['siswa_id'] = Session::get('id');
        $data['isi'] = $isi;
        $data['jenis'] = $request->jenis;
        $data['deskripsi'] = $request->deskripsi;
        $data['status'] = 1;
        $data['created_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $data['updated_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));

        TugasJawaban::insert($data);
        return redirect()->back()->with('sukses', 'Tugas Berhasil Dikerjakan');
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

            'deskripsi' => 'required',
            'isi' => 'required',

        ], $messages);
        $telat = today();
        $tugas = Tugas::find($request->id);
        if ($telat > $tugas->batas_waktu) {
            return redirect()->back()->with('gagal', 'Batas Waktu Pengumpulan Habis!');
        }

        $isi = $request->isi;
        if ($request->jenis == "file") {
            $request->validate(
                [
                    'isi' => 'file|mimes:pdf,doc,docx,png',
                ]
            );
            $isi = $request->file('isi')->store('public/tugas');
        }
        // $data['tugas_id'] = $request->id;
        // $data['siswa_id'] = Session::get('id');
        $data['isi'] = $isi;
        $data['jenis'] = $request->jenis;
        $data['deskripsi'] = $request->deskripsi;
        $data['status'] = 1;
        // $data['created_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $data['updated_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));

        TugasJawaban::where('id', $id)->update($data);
        return redirect()->back()->with('sukses', 'Tugas Berhasil Dikerjakan');
    }
}
