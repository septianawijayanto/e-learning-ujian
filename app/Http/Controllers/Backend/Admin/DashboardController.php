<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;


use App\Models\Model\Guru;
use App\Models\Model\Kelas;
use App\Models\Model\Mapel;
use App\Models\Model\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard Admin';
        $siswa = Siswa::count();
        $sb = Siswa::where('created_at', today())->count();
        $guru = Guru::count();
        $gb = Guru::where('created_at', today())->count();
        $mapel = Mapel::count();
        $mb = Mapel::where('created_at', today())->count();
        $kelas = Kelas::count();
        $kb = Kelas::where('created_at', today())->count();

        return view('admin.dashboard.index', compact(
            'title',
            'siswa',
            'guru',
            'mapel',
            'kelas',
            'sb',
            'gb',
            'kb',
            'mb'
        ));
    }
}
