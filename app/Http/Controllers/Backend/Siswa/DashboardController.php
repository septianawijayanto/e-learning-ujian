<?php

namespace App\Http\Controllers\Backend\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Model\GrupSiswa;
use App\Models\Model\Materi;
use App\Models\Model\Tugas;
use App\Models\Model\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Siswa';
        $grup = GrupSiswa::where('siswa_id', Session::get('id'))->count();
        $gb = GrupSiswa::where('siswa_id', Session::get('id'))->where('created_at', today())->count();
        $materi = Materi::count();
        $mb = Materi::where('created_at', today())->count();
        $tugas = Tugas::count();
        $tb = Tugas::where('created_at', today())->count();
        $ujian = Ujian::count();
        $ub = Ujian::where('created_at', today())->count();
        return view('siswa.dashboard.index', compact(
            'title',
            'grup',
            'gb',
            'materi',
            'mb',
            'tugas',
            'tb',
            'ujian',
            'ub'
        ));
        // return view('siswa.dashboard.index', compact('title'));
    }
}
