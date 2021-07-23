<?php

use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\GuruController;
use App\Http\Controllers\Backend\Admin\KelasController;
use App\Http\Controllers\Backend\Admin\MapelController;
use App\Http\Controllers\Backend\Admin\SiswaController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Guru\DashboardController as GuruDashboardController;
use App\Http\Controllers\Backend\Guru\GrupController;
use App\Http\Controllers\Backend\Guru\KelolaJawabanController;
use App\Http\Controllers\Backend\Guru\KelolaNilaiController;
use App\Http\Controllers\Backend\Guru\MateriController;
use App\Http\Controllers\Backend\Guru\TugasController;
use App\Http\Controllers\Backend\Guru\UjianController;
use App\Http\Controllers\Backend\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Backend\Siswa\SiswaGrupController;
use App\Http\Controllers\Backend\Siswa\SiswaJawabUjianController;
use App\Http\Controllers\Backend\Siswa\SiswaKerjakanTugasController;
use App\Http\Controllers\Backend\Siswa\SiswaMateriController;
use App\Http\Controllers\Backend\Siswa\SiswaNilaiController;
use App\Http\Controllers\Backend\Siswa\SiswaUjianController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('login');
});
Route::get('login', [LoginController::class, 'index']);
Route::post('post/login', [LoginController::class, 'postlogin']);
Route::get('logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'admin'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        //Siswa
        Route::get('siswa', [SiswaController::class, 'index'])->name('siswa');
        Route::post('siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('siswa/{id}/edit', [SiswaController::class, 'edit']);
        Route::post('siswa/{id}/update', [SiswaController::class, 'update']);
        Route::get('siswa/{id}/delete', [SiswaController::class, 'delete']);
        Route::get('siswa/{id}/show', [SiswaController::class, 'show']);
        Route::get('siswa/cetak', [SiswaController::class, 'cetak']);

        //Guru
        Route::get('guru', [GuruController::class, 'index'])->name('guru');
        Route::post('guru/store', [GuruController::class, 'store'])->name('guru.store');
        Route::get('guru/{id}/edit', [GuruController::class, 'edit']);
        Route::post('guru/{id}/update', [GuruController::class, 'update']);
        Route::get('guru/{id}/delete', [GuruController::class, 'delete']);
        Route::get('guru/{id}/show', [GuruController::class, 'show']);
        Route::get('guru/cetak', [GuruController::class, 'cetak']);

        //Mapel
        Route::get('mapel', [MapelController::class, 'index'])->name('mapel');
        Route::post('mapel/store', [MapelController::class, 'store'])->name('mapel.store');
        Route::get('mapel/{id}/edit', [MapelController::class, 'edit']);
        Route::post('mapel/{id}/update', [MapelController::class, 'update']);
        Route::get('mapel/{id}/delete', [MapelController::class, 'delete']);

        //Kelas
        Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
        Route::post('kelas/store', [KelasController::class, 'store'])->name('kelas.store');
        Route::get('kelas/{id}/edit', [KelasController::class, 'edit']);
        Route::post('kelas/{id}/update', [KelasController::class, 'update']);
        Route::get('kelas/{id}/delete', [KelasController::class, 'delete']);
    });
});

Route::group(['middleware' => 'guru'], function () {
    Route::prefix('guru')->group(function () {
        Route::get('dashboard', [GuruDashboardController::class, 'index'])->name('dashboard.guru');

        //Forum Belajar
        Route::get('grup', [GrupController::class, 'index'])->name('grup');
        Route::get('grup/{id}/detail', [GrupController::class, 'detail']);
        // Route::get('grup/create', [GrupController::class, 'create'])->name('grup.create');
        Route::post('grup/store', [GrupController::class, 'store'])->name('grup.store');
        Route::get('grup/{id}/edit', [GrupController::class, 'edit']);
        Route::post('grup/{id}/update', [GrupController::class, 'update']);
        Route::get('grup/{id}/delete', [GrupController::class, 'delete']);

        //Kelola Materi Kelas
        Route::post('grup-materi', [GrupController::class, 'matericreate']);
        Route::get('grup-materi/delete/{id}', [GrupController::class, 'materidelete']);
        Route::get('grup-materi/detail/{id}', [GrupController::class, 'materidetail']);


        //Kelola Siswa Kekelas
        Route::post('grup-siswa/create', [GrupController::class, 'siswacreate'])->name('siswa.create');
        Route::get('grup-siswa/delete/{id}', [GrupController::class, 'siswadelete']);

        //Materi
        Route::get('materi', [MateriController::class, 'index'])->name('materi.index');
        Route::get('materi/create', [MateriController::class, 'create'])->name('materi.create');
        Route::post('materi/store', [MateriController::class, 'store'])->name('materi.store');
        Route::get('materi/{id}/edit', [MateriController::class, 'edit']);
        Route::post('materi/{id}/update', [MateriController::class, 'update']);
        Route::get('materi/{id}/delete', [MateriController::class, 'delete']);

        //Tugas
        Route::get('tugas', [TugasController::class, 'index'])->name('tugas');
        Route::get('tugas/{id}/show', [TugasController::class, 'show']);
        Route::get('tugas/create', [TugasController::class, 'create'])->name('tugas.create');
        Route::post('tugas/store', [TugasController::class, 'store'])->name('tugas.store');
        Route::get('tugas/{id}/edit', [TugasController::class, 'edit']);
        Route::post('tugas/{id}/update', [TugasController::class, 'update']);
        Route::get('tugas/{id}/delete', [TugasController::class, 'delete']);
        Route::get('tugas/{id}/terima-jawaban', [TugasController::class, 'terimajawaban']);
        Route::get('tugas/{id}/delete-jawaban', [TugasController::class, 'deletejawaban']);
        Route::match(['get', 'post'], 'tugas/{id}/nilai-jawaban', [TugasController::class, 'nilaijawaban']);

        //Ujian
        Route::get('ujian', [UjianController::class, 'index'])->name('ujian');
        Route::post('ujian/store', [UjianController::class, 'store'])->name('ujian.store');
        Route::get('ujian/{id}/edit', [UjianController::class, 'edit']);
        Route::post('ujian/{id}/update', [UjianController::class, 'update']);
        Route::get('ujian/{id}/delete', [UjianController::class, 'delete']);
        Route::get('ujian/{id}/detail', [UjianController::class, 'detail']);
        Route::post('ujian/terbitkan-soal', [UjianController::class, 'terbitkanSoal']);

        //Pilgan
        Route::get('pilgan/index', [UjianController::class, 'createpilgan'])->name('pilgan.index');
        Route::post('pilgan/add', [UjianController::class, 'addpilgan'])->name('pilgan.add');
        Route::get('pilgan/{id}/detail', [UjianController::class, 'detailpilgan']);
        Route::get('pilgan/{id}/edit', [UjianController::class, 'editpilgan']);
        Route::delete('pilgan/{id}/delete', [UjianController::class, 'deletepilgan']);

        //Essay
        Route::get('essay/index', [UjianController::class, 'createessay'])->name('essay.index');
        Route::post('essay/add', [UjianController::class, 'addessay'])->name('essay.add');
        Route::get('essay/{id}/detail', [UjianController::class, 'detailessay']);
        Route::get('essay/{id}/edit', [UjianController::class, 'editessay']);
        Route::delete('essay/{id}/delete', [UjianController::class, 'deleteessay']);

        //Kelola Nilai
        Route::get('kelola-nilai', [KelolaNilaiController::class, 'index'])->name('nilai');
        Route::get('nilai/{id}/detail', [KelolaNilaiController::class, 'detail']);
        Route::get('nilai/{id}/delete', [KelolaNilaiController::class, 'delete']);
        Route::get('nilai/cetak', [KelolaNilaiController::class, 'cetak']);

        //Kelola Jawaban
        Route::get('jawaban', [KelolaJawabanController::class, 'index'])->name('jawaban');
        Route::get('jawaban/{id}/detail-pilgan', [KelolaJawabanController::class, 'detailpilgan']);
        Route::delete('jawaban/{id}/reset', [KelolaJawabanController::class, 'resetjawaban']);
    });
});



Route::group(['middleware' => 'siswa'], function () {
    Route::prefix('siswa')->group(function () {
        Route::get('dashboard', [SiswaDashboardController::class, 'index'])->name('dashboard.siswa');


        //Grup Gabung  
        Route::post('gabung-grup', [SiswaGrupController::class, 'store'])->name('gabung');
        //Grup
        Route::get('grup/index', [SiswaGrupController::class, 'index'])->name('grup.index');
        Route::get('grup/detail/{id}', [SiswaGrupController::class, 'detail']);
        Route::get('grup/materi/show/{id}', [SiswaGrupController::class, 'show']);
        Route::get('grup/materi/keluar/{id}', [SiswaGrupController::class, 'keluar']);

        //Tugas
        Route::get('tugas', [SiswaKerjakanTugasController::class, 'index'])->name('tugas.index');
        Route::get('tugas/{id}/detail', [SiswaKerjakanTugasController::class, 'show']);
        Route::get('tugas/{id}/kerjakan', [SiswaKerjakanTugasController::class, 'kerjakan']);
        Route::post('tugas/simpan', [SiswaKerjakanTugasController::class, 'simpan']);
        Route::post('tugas/{id}/update', [SiswaKerjakanTugasController::class, 'update']);
        // Route::get('tugas/{id}/detail', [SiswaKerjakanTugasController::class, 'detail']);


        //Ujian Pilgan
        Route::get('ujian/index', [SiswaUjianController::class, 'index'])->name('siswa.ujian.index');
        Route::get('ujian/{id}/detail/ujian', [SiswaUjianController::class, 'detail']);
        Route::get('ujian/mulai/{id}', [SiswaUjianController::class, 'mulai']);



        //Jawab Ujian
        Route::post('ujian/jawab-pilgan', [SiswaJawabUjianController::class, 'jawabpilgan'])->name('jawab.pilgan');
        Route::post('ujian/selesai', [SiswaJawabUjianController::class, 'kirimpilgan']);
        Route::get('ujian/{id}/finish-pilgan', [SiswaJawabUjianController::class, 'finishpilgan']);

        //Essay
        Route::post('ujian/jawab-essay', [SiswaJawabUjianController::class, 'jawabessay'])->name('jawab.essay');
        Route::post('ujian/selesai-essay', [SiswaJawabUjianController::class, 'kirimessay']);
        Route::get('ujian/{id}/finish-essay', [SiswaJawabUjianController::class, 'finishessay']);


        Route::get('nilai', [SiswaNilaiController::class, 'index'])->name('siswa.nilai');
    });
});
