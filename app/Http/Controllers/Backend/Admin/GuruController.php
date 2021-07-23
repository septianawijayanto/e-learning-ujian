<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\Guru;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $title = 'Data Guru';
        $data = Guru::all();
        return view('admin.guru.index', compact('title', 'data'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'unique' => ':attribute sudah terdaftar!',
            'foto.mimes' => 'Format Foto jpg/jpeg/png',
        ];
        //dd($request->all());
        $this->validate($request, [
            'nama' => 'required|max:50',
            'no_induk' => 'required|max:20|unique:guru',
            'jenkel' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:8',
            'no_telp' => 'required|max:15',
            'agama' => 'required',
            'deskripsi' => 'required',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'username' => 'required|unique:guru',
            'foto' => 'mimes:jpg,jpeg,png',
        ], $messages);
        $data['no_induk'] = $request->no_induk;
        $data['nama'] = $request->nama;
        $data['username'] = $request->username;
        $data['password'] = bcrypt($request->password);
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['no_telp'] = $request->no_telp;
        $data['jenkel'] = $request->jenkel;
        $data['agama'] = $request->agama;
        $data['alamat'] = $request->alamat;
        $data['deskripsi'] = $request->deskripsi;
        $data['status'] = $request->status;
        $data['created_at'] =  date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $file = $request->file('foto');
        if ($file) {
            $data['foto'] = $file->store('public/foto');
        }
        Guru::insert($data);
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambah');
    }
    public function delete($id)
    {
        try {
            $data = Guru::find($id);
            $data->delete();
            return \redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return \redirect()->back()->with('gagal', 'Gagal Data Berelasi di tabel lain');
        }
    }
    public function edit($id)
    {
        $title = 'Edit Data guru';
        $data = Guru::find($id);
        return view('admin.guru.edit', compact('title', 'data'));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'unique' => ':attribute sudah terdaftar!',
            'foto.mimes' => 'Format Foto jpg/jpeg/png',
        ];
        //dd($request->all());
        $this->validate($request, [
            'nama' => 'required|max:50',
            'no_induk' => 'required|max:20',
            'jenkel' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:8',
            'no_telp' => 'required|max:15',
            'agama' => 'required',
            'deskripsi' => 'required',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'username' => 'required',
            'foto' => 'mimes:jpg,jpeg,png',
        ], $messages);
        $data['no_induk'] = $request->no_induk;
        $data['nama'] = $request->nama;
        $data['username'] = $request->username;
        $data['password'] = bcrypt($request->password);
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['no_telp'] = $request->no_telp;
        $data['jenkel'] = $request->jenkel;
        $data['agama'] = $request->agama;
        $data['alamat'] = $request->alamat;
        $data['deskripsi'] = $request->deskripsi;
        $data['status'] = $request->status;
        // $data['created_at']=
        $data['updated_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $file = $request->file('foto');
        if ($file) {
            $data['foto'] = $file->store('public/foto');
        }
        guru::where('id', $id)->update($data);
        return redirect('admin/guru')->with('sukses', 'Data Berhasil Dirubah');
    }
    public function show($id)
    {
        $data = Guru::find($id);
        $title = "Detail Data $data->nama";
        return view('admin.guru.show', compact('title', 'data'));
    }
    public function cetak(Request $request)
    {
        $title = 'Data Guru';
        $tgl = date('d F Y');
        $data = Guru::get();
        $pdf = PDF::loadView('admin.guru.lapguru', compact('data', 'tgl', 'title'))->setPaper('a4', 'Landscape');
        return $pdf->stream();
    }
}
