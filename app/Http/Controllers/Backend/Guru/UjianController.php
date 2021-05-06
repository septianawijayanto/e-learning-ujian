<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\DistribusiSoal;
use App\Models\Model\Guru;
use App\Models\Model\Kelas;
use App\Models\Model\Mapel;
use App\Models\Model\SoalEssay;
use App\Models\Model\SoalPilgan;
use App\Models\Model\Ujian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use Yajra\DataTables\DataTables;

class UjianController extends Controller
{
    public function index()
    {
        $title = 'Data Ujian';
        $mapel = Mapel::get();
        $guru = Guru::get();
        //Guru_id Session id
        $data = Ujian::where('guru_id', Session::get('id'))->get();
        return view('guru.ujian.index', compact('title', 'data', 'mapel', 'guru'));
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
            'mapel_id' => 'required',
            // 'guru_id' => 'required',
            'jenis' => 'required',
            'paket' => 'required|max:50',
            'deskripsi' => 'required',
            'waktu' => 'required|max:32',

        ], $messages);
        $data['mapel_id'] = $request->mapel_id;
        $data['guru_id'] = Session::get('id');
        $data['jenis'] = $request->jenis;
        $data['paket'] = $request->paket;
        $data['deskripsi'] = $request->deskripsi;
        $data['waktu'] = $request->waktu;
        $data['created_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        $data['updated_at'] =  date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        Ujian::insert($data);
        return redirect()->back()->with('sukses', 'Ujian Berhasil Dibuat');
    }
    public function edit($id)
    {
        $title = 'Edit Ujia';
        $mapel = Mapel::get();
        $guru = Guru::get();
        $data = Ujian::find($id);
        return view('guru.ujian.edit', compact('title', 'data', 'mapel', 'guru'));
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
            'mapel_id' => 'required',
            // 'guru_id' => 'required',
            'jenis' => 'required',
            'paket' => 'required|max:50',
            'deskripsi' => 'required',
            'waktu' => 'required|max:32',

        ], $messages);
        $data['mapel_id'] = $request->mapel_id;
        $data['guru_id'] = Session::get('id');
        $data['jenis'] = $request->jenis;
        $data['paket'] = $request->paket;
        $data['deskripsi'] = $request->deskripsi;
        $data['waktu'] = $request->waktu;
        $data['updated_at'] = date('Y-m-d H:i:s', strtotime(Carbon::today()->toDateString()));
        Ujian::where('id', $id)->update($data);
        return redirect('guru/ujian')->with('sukses', 'Data Berhasil Diupdate');
    }
    public function delete($id)
    {
        try {
            $data = Ujian::find($id);
            $data->delete();
            return \redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return \redirect()->back()->with('gagal', 'Gagal Data Berelasi di tabel lain');
        }
    }
    public function detail($id)
    {
        $title = 'Detail Soal';

        $ujian = Ujian::join('guru', 'ujian.guru_id', '=', 'guru.id')
            ->select('ujian.*', 'guru.nama as nama_guru', 'ujian.id as ujian_id')

            ->where('ujian.id', $id)->get($id);
        $cekDistribusisoal = DistribusiSoal::get();
        if (count($cekDistribusisoal) > 0) {
            // $kelas = Kelas::leftjoin('distribusi_soal', 'kelas.id', '=', 'distribusi_soal.kelas_id')
            //     ->select('distribusi_soal.ujian_id', 'kelas.*')
            //     ->where('kelas.guru_id', Session::get('id'))
            //     ->orderBy('kelas.id', 'ASC')
            //     ->groupBy('kelas.id')
            //     ->get();
            $kelas = Kelas::get();
        } else {
            $kelas = Kelas::get();
        }


        return view('guru.ujian.detail', compact('title', 'ujian', 'kelas'));
    }
    public function terbitkanSoal(Request $request)
    {

        $cek = DistribusiSoal::where('ujian_id', $request->ujian_id)->where('kelas_id', $request->kelas_id)->first();
        if ($cek != "") {
            DistribusiSoal::where('ujian_id', $request->ujian_id)->where('kelas_id', $request->kelas_id)->delete();
            return 'N';
        } else {
            $query = new DistribusiSoal;
            $query->ujian_id = $request->ujian_id;
            $query->kelas_id = $request->kelas_id;
            $query->save();
            // return response()->json($query);
            return 'Y';
        }
    }
    public function createpilgan(Request $request)
    {
        $id = $_GET['id'];
        if ($request->ajax()) {
            $pilgan = SoalPilgan::where('ujian_id', $id)->latest()->get();
            return DataTables::of($pilgan)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/guru/pilgan/' . $row->id . '/detail/" data-toggle="tooltip"   data-original-title="Detail" class="btn btn-primary btn-sm detail"><i class="far fa-eye"></i> Detail</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-warning btn-sm edit"><i class="fas fa-pencil-alt"></i> Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="far fa-times-circle"></i> Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function addpilgan(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'soal' => 'required',
            'pil_a' => 'required',
            'pil_b' => 'required',
            'pil_c' => 'required',
            'pil_d' => 'required',
            'kunci' => 'required',
            'skor' => 'required|integer',

        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => true]);
        } else if ($validate->passes()) {
            if (isset($request->hidden_id)) {
                SoalPilgan::find($request->hidden_id)->update([
                    'guru_id' => $request->guru_id,
                    'soal' => $request->soal,
                    'pil_a' => $request->pil_a,
                    'pil_b' => $request->pil_b,
                    'pil_c' => $request->pil_c,
                    'pil_d' => $request->pil_d,
                    'kunci' => $request->kunci,
                    'skor' => $request->skor,
                    'jenis' => $request->jenis,
                    'ujian_id' => $request->ujian_id,
                ]);

                return response()->json(['update' => true]);
            } else {
                SoalPilgan::create([
                    'guru_id' => $request->guru_id,
                    'soal' => $request->soal,
                    'pil_a' => $request->pil_a,
                    'pil_b' => $request->pil_b,
                    'pil_c' => $request->pil_c,
                    'pil_d' => $request->pil_d,
                    'kunci' => $request->kunci,
                    'skor' => $request->skor,
                    'jenis' => $request->jenis,
                    'ujian_id' => $request->ujian_id,
                ]);
                return response()->json(['success' => true]);
            }
        }
    }
    public function editpilgan($id)
    {
        $data = SoalPilgan::where('id', $id)->first();
        return response()->json($data);
    }
    public function deletepilgan($id)
    {
        $data = SoalPilgan::where('id', $id)->delete();
        return response()->json($data);
    }
    public function detailpilgan($id)
    {
        $data = SoalPilgan::where('id', $id)->first();
        return view('guru.ujian.pilgan.detail', compact('data'));
    }
    public function createessay(Request $request)
    {
        $id = $_GET['id'];
        if ($request->ajax()) {
            $essay = SoalEssay::where('ujian_id', $id)->latest()->get();
            return Datatables::of($essay)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit_essay btn btn-warning btn-sm edit_essay"><i class="fas fa-pencil-alt"></i> Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete_essay"><i class="far fa-times-circle"></i> Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function addessay(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'soal_essay' => 'required',

        ]);

        if ($validate->fails()) {
            return response()->json(['errors' => true]);
        } else if ($validate->passes()) {
            if (isset($request->hidden_essay)) {
                SoalEssay::find($request->hidden_essay)->update([
                    'guru_id' => $request->guru_id,
                    'soal' => $request->soal_essay,
                    'jenis' => $request->jenis_soal,
                    'ujian_id' => $request->ujian_id,
                ]);

                return response()->json(['update' => true]);
            } else {

                SoalEssay::create([
                    'guru_id' => $request->guru_id,
                    'soal' => $request->soal_essay,
                    'jenis' => $request->jenis_soal,
                    'ujian_id' => $request->ujian_id,
                ]);

                return response()->json(['success' => true]);
            }
        }
    }
    public function editessay($id)
    {
        $data = SoalEssay::findOrFail($id);
        return response()->json(['data' => $data]);
    }
    public function deleteessay($id)
    {
        $data = SoalEssay::where('id', $id)->delete();
        return response()->json($data);
    }
}
