<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\Kelas;
use App\Models\Model\Siswa;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $title = 'Data Siswa';
        $data = Siswa::all();
        $kelas = Kelas::get();
        return view('admin.siswa.index', compact('title', 'data', 'kelas'));
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
            'no_induk' => 'required|max:10|unique:siswa',
            'nisn' => 'required|max:15|unique:siswa',
            'jenkel' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:8',
            'no_telp' => 'required|max:15',
            'agama' => 'required',
            'deskripsi' => 'required',
            'tempat_lahir' => 'required|max:50',
            'tgl_lahir' => 'required',
            'status' => 'required',
            'kelas_id' => 'required',
            'username' => 'required|unique:siswa',
            'foto' => 'mimes:jpg,jpeg,png',
        ], $messages);
        $data['kelas_id'] = $request->kelas_id;
        $data['no_induk'] = $request->no_induk;
        $data['nisn'] = $request->nisn;
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
        $data['updated_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));

        $file = $request->file('foto');
        if ($file) {
            $data['foto'] = $file->store('public/foto');
        }
        Siswa::insert($data);
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambah');
    }
    public function delete($id)
    {
        try {
            $data = Siswa::find($id);
            $data->delete();
            return \redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return \redirect()->back()->with('gagal', 'Gagal Data Berelasi di tabel lain');
        }
    }
    public function edit($id)
    {
        $kelas = Kelas::get();
        $title = 'Edit Data Siswa';
        $data = Siswa::find($id);
        return view('admin.siswa.edit', compact('title', 'data', 'kelas'));
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
            'no_induk' => 'required|max:10',
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
            'kelas_id' => 'required',
            'foto' => 'mimes:jpg,jpeg,png',
        ], $messages);
        $data['kelas_id'] = $request->kelas_id;
        $data['no_induk'] = $request->no_induk;
        $data['nisn'] = $request->nisn;
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
        Siswa::where('id', $id)->update($data);
        return redirect('admin/siswa')->with('sukses', 'Data Berhasil Dirubah');
    }
    public function show($id)
    {
        $data = Siswa::find($id);
        $title = "Detail Data $data->nama";
        return view('admin.siswa.show', compact('title', 'data'));
    }
    public function cetak(Request $request)
    {
        $title = 'Data Siswa';
        $tgl = date('d F Y');
        $data = Siswa::get();
        $pdf = PDF::loadView('admin.siswa.lapsiswa', compact('data', 'tgl', 'title'))->setPaper('a4', 'Landscape');
        return $pdf->stream();
    }
}
