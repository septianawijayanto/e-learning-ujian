<?php

namespace App\Http\Controllers\Backend\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Model\KelolaNilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiswaNilaiController extends Controller
{
    public function index()
    {
        $title = 'Nilai';
        $data = KelolaNilai::where('siswa_id', Session::get('id'))->get();
        return view('siswa.nilai.index', compact('title', 'data'));
    }
}
