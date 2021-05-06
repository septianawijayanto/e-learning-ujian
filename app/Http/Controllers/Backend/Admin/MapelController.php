<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Model\Mapel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MapelController extends Controller
{

    public function index()
    {
        $title = 'Data Mata Pelajaran';
        $data = Mapel::all();
        return view('admin.mapel.index', compact('title', 'data'));
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
            'mapel' => 'required|max:50',
            'kode_mapel' => 'required|max:15|unique:mapel',

        ], $messages);
        $data = Mapel::create($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Ditambah');
    }
    public function delete($id)
    {
        try {
            $data = Mapel::find($id);
            $data->delete();
            return \redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return \redirect()->back()->with('gagal', 'Gagal Data Berelasi di tabel lain');
        }
    }
    public function edit($id)
    {
        $title = 'Edit Data mapel';
        $data = Mapel::find($id);
        return view('admin.mapel.edit', compact('title', 'data'));
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
            'mapel' => 'required|max:50',
            'kode_mapel' => 'required|max:15',
        ], $messages);
        $data['kode_mapel'] = $request->kode_mapel;
        $data['mapel'] = $request->mapel;
        $data['updated_at'] =  $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));

        Mapel::where('id', $id)->update($data);
        return redirect('admin/mapel')->with('sukses', 'Data Berhasil Dirubah');
    }
}
