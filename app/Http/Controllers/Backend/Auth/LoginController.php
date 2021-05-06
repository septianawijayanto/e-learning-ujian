<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Model\Admin;
use App\Models\Model\Anggota;
use App\Models\Model\Guru;
use App\Models\Model\Kelas;
use App\Models\Model\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Shared\Trend\Trend;

class LoginController extends Controller
{
    public function index()
    {
        if (Session::has('login_sebagai')) {
            if (Session::get('login_sebagai') == 'admin') {
                return redirect('admin/dashboard');
            } elseif (Session::get('login_sebagai') == 'guru') {
                return redirect('guru/dashboard');
            } else {
                return redirect('siswa/dashboard');
            }
        }
        return view('auth.login');
    }
    public function logout()
    {
        Session::flush();
        return redirect('login')->with('sukses', 'Anda Berhasil Keluar Dari Sistem');
    }
    public function postlogin(Request $request)
    {
        // dd($request->all());
        $username = $request->username;
        $password = $request->password;
        $loginSebagai = $request->masuk_sebagai;
        if ($loginSebagai == 'admin') {
            $data = Admin::where('username', $username)->first();
            if ($data) { //apakah username tersebut ada atau tidak
                if (Hash::check($password, $data->password)) {
                    Session::put('id', $data->id);
                    Session::put('nama', $data->nama);
                    Session::put('username', $data->username);
                    Session::put('foto' . $data->foto);
                    Session::put('login_sebagai', 'admin');
                    Session::put('login', TRUE);
                    return redirect('admin/dashboard')->with('sukses', 'Anda Berhasil Masuk Ke Sistem');
                }
            }
            return redirect('login')->with('gagal', 'Username atau password salah !');
        } elseif ($loginSebagai == 'guru') {
            $data = Guru::where('username', $username)->first();
            if ($data) { //apakah username tersebut ada atau tidak
                if (Hash::check($password, $data->password)) {
                    Session::put('id', $data->id);
                    Session::put('nama', $data->nama);
                    Session::put('username', $data->username);
                    Session::put('foto' . $data->foto);
                    Session::put('no_induk', $data->no_induk);
                    Session::put('tempat_lahir', $data->tempat_lahir);
                    Session::put('tgl_lahir', $data->tgl_lahir);
                    Session::put('agama', $data->agama);
                    Session::put('no_telp', $data->no_telp);
                    Session::put('alamat', $data->alamat);
                    Session::put('jenkel', $data->jenkel);
                    Session::put('status', $data->status);
                    Session::put('deskripsi', $data->deskripsi);
                    Session::put('login_sebagai', 'guru');
                    Session::put('login', TRUE);
                    return redirect('guru/dashboard')->with('sukses', 'Anda Berhasil Masuk Ke Sistem');
                }
            }
            return redirect('login')->with('gagal', 'Username atau password salah !');
        } else {
            $data = Siswa::where('username', $username)->first();
            $kelas = Kelas::Where('id', $data->kelas_id)->first();
            if ($data) {
                if (Hash::check($password, $data->password)) {
                    Session::put('id', $data->id);
                    Session::put('nama', $data->nama);
                    Session::put('kelas_id', $data->kelas_id);
                    Session::put('username' . $data->username);
                    Session::put('foto' . $data->foto);
                    Session::put('no_induk', $data->no_induk);
                    Session::put('tempat_lahir', $data->tempat_lahir);
                    Session::put('tgl_lahir', $data->tgl_lahir);
                    Session::put('agama', $data->agama);
                    Session::put('nama_kelas', $kelas->kelas);
                    Session::put('no_telp', $data->no_telp);
                    Session::put('jenkel', $data->jenkel);
                    Session::put('alamat', $data->alamat);
                    Session::put('status', $data->status);
                    Session::put('deskripsi', $data->deskripsi);
                    Session::put('status', $data->status);
                    Session::put('login_sebagai', 'siswa');
                    Session::put('login', TRUE);
                    return \redirect('siswa/dashboard')->with('sukses', 'Anda Berhasil Masuk Ke Sistem');
                }
            }
            return \redirect('login')->with('gagal', 'Username atau password salah !');
        }
    }
}
