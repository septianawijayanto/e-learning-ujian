<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\Guru;
use App\Models\Model\Kelas;
use App\Models\Model\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $title = 'Data kelas';
        $guru = Guru::get();
        $siswa = Siswa::get();
        $data = Kelas::all();
        return view('admin.kelas.index', compact('title', 'data', 'guru', 'siswa'));
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'unique' => ':attribute sudah terdaftar!',
        ];
        //dd($request->all());
        $this->validate($request, [
            // 'siswa_id' => 'required',
            'guru_id' => 'required',
            'kelas' => 'required',

        ], $messages);
        $data = Kelas::create($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambah');
    }
    public function delete($id)
    {
        try {
            $data = Kelas::find($id);
            $data->delete();
            return \redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return \redirect()->back()->with('gagal', 'Gagal Data Berelasi di tabel lain');
        }
    }
    public function edit($id)
    {
        $title = 'Edit Data Kelas';
        $guru = Guru::get();
        $data = Kelas::find($id);
        return view('admin.kelas.edit', compact('title', 'data', 'guru'));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'min' => ':attribute harus diisi minimal :min karakter!',
            'max' => ':attribute harus diisi maksimal :max karakter!',
            'unique' => ':attribute sudah terdaftar!',
        ];
        //dd($request->all());
        $this->validate($request, [
            'guru_id' => 'required',
            'kelas' => 'required',

        ], $messages);
        $data['guru_id'] = $request->guru_id;
        $data['kelas'] = $request->kelas;
        $data['updated_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));

        Kelas::where('id', $id)->update($data);
        return redirect('admin/mapel')->with('sukses', 'Data Berhasil Dirubah');
    }
}
