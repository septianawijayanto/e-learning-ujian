<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MateriController extends Controller
{
    public function index()
    {
        $title = 'Materi';
        $data = Materi::whereGuruId(Session::get('id'))->get();
        return view('guru.materi.index', compact('title', 'data'));
    }
    public function create()
    {
        $title = 'Materi';
        $data = Materi::get();
        return view('guru.materi.create', compact('title', 'data'));
    }
    public function store(Request $request)
    {
        $messages = [

            'isi.required' => 'Isi Wajib di Isi',
            'judul.required' => 'Judul Wajib di Isi',

        ];
        //dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
        ], $messages);
        $isi = $request->isi;
        if ($request->jenis == "file") {
            $request->validate(
                [
                    'isi' => 'file|mimes:pdf,doc,docx,png',
                ]
            );
            $isi = $request->file('isi')->store('public/materi');
        }
        $data['jenis'] = $request->jenis;
        $data['isi'] = $isi;
        $data['guru_id'] = Session::get('id');
        $data['judul'] = $request->judul;
        Materi::create($data);
        return redirect()->back()->with('sukses', 'Materi Behasili ditambah');
    }
    public function edit($id)
    {
        $title = 'Materi';

        $data = Materi::find($id);
        return view('guru.materi.edit', compact('title', 'data'));
    }
    public function update(Request $request, $id)
    {
        $messages = [

            'isi.required' => 'Nama Guru Wajib di Isi',
            'jenis.required' => 'Mapel Wajib di Isi',

        ];
        //dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
        ], $messages);
        $cek = Materi::find($id);

        $isi = $request->isi;
        if ($cek->jenis == "file") {
            $request->validate(
                [
                    'isi' => 'file|mimes:pdf,doc,docx,png',
                ]
            );
            $isi = $request->file('isi')->store('public/materi');
        }
        $data['isi'] = $isi;
        $data['judul'] = $request->judul;
        Materi::where('id', $id)->update($data);
        return redirect('guru/materi')->with('sukses', 'Materi Behasili diupdate');
    }
    public function delete($id)
    {
        try {
            $data = Materi::find($id);
            $data->delete();
            return \redirect()->back()->with('sukses', 'Materi Berhasil Dihapus');
        } catch (\Throwable $th) {
            return \redirect()->back()->with('gagal', 'Gagal Data Berelasi di tabel lain');
        }
    }
}
