<?php

namespace App\Http\Controllers\Backend\Guru;

use App\Http\Controllers\Controller;
use App\Models\Model\Grup;
use App\Models\Model\Materi;
use App\Models\Model\Tugas;
use App\Models\Model\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Guru';
        $grup = Grup::where('guru_id', Session::get('id'))->count();
        $gb = Grup::where('guru_id', Session::get('id'))->where('created_at', today())->count();
        $materi = Materi::where('guru_id', Session::get('id'))->count();
        $mb = Materi::where('guru_id', Session::get('id'))->where('created_at', today())->count();
        $tugas = Tugas::where('guru_id', Session::get('id'))->count();
        $tb = Tugas::where('guru_id', Session::get('id'))->where('created_at', today())->count();
        $ujian = Ujian::where('guru_id', Session::get('id'))->count();
        $ub = Ujian::where('guru_id', Session::get('id'))->where('created_at', today())->count();
        return view('guru.dashboard.index', compact(
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
    }
}
