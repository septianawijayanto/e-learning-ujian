<?php

namespace Database\Seeders;

use App\Models\Model\Admin;
use App\Models\Model\Anggota;
use App\Models\Model\Guru;
use App\Models\Model\Kelas;
use App\Models\Model\Mapel;
use App\Models\Model\Siswa;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'foto' => '',
            'password' => \bcrypt('admin')
        ]);
        Guru::create([
            'no_induk' => '1',
            'nama' => 'Guru',
            'username' => 'guru',
            'foto' => '',
            'password' => \bcrypt('guru'),
            'tempat_lahir' => 'Jambi',
            'tgl_lahir' => now(),
            'agama' => 'Islam',
            'no_telp' => '089998',
            'alamat' => 'Jambi',
            'jenkel' => 'Laki-laki',
            'status' => '1',
            'deskripsi' => 'guru1'
        ]);
        Guru::create([
            'no_induk' => '2',
            'nama' => 'Guru2',
            'username' => 'guru2',
            'foto' => '',
            'password' => \bcrypt('guru'),
            'tempat_lahir' => 'Jambi',
            'tgl_lahir' => now(),
            'agama' => 'Islam',
            'no_telp' => '089998',
            'alamat' => 'Jambi',
            'jenkel' => 'Laki-laki',
            'status' => '1',
            'deskripsi' => 'guru1'
        ]);
        Kelas::create([
            'guru_id' => 1,
            'kelas' => '7A'
        ]);
        Kelas::create([
            'guru_id' => 2,
            'kelas' => '7B'
        ]);
        Mapel::create([
            'kode_mapel' => '1',
            'mapel' => 'Bahas Indonesia'
        ]);
        Mapel::create([
            'kode_mapel' => '1',
            'mapel' => 'Bahas Inggris'
        ]);
        Siswa::create([
            'kelas_id' => 1,
            'no_induk' => '1',
            'nama' => 'Siswa',
            'username' => 'siswa',
            'foto' => '',
            'nisn' => '123',
            'password' => \bcrypt('siswa'),
            'tempat_lahir' => 'Jambi',
            'tgl_lahir' => now(),
            'agama' => 'Islam',
            'no_telp' => '0899898',
            'alamat' => 'Jambi',
            'jenkel' => 'Laki-laki',
            'status' => '1',
            'deskripsi' => 'siswa1'
        ]);
        Siswa::create([
            'kelas_id' => 2,
            'no_induk' => '2',
            'nama' => 'Siswa2',
            'username' => 'siswa2',
            'foto' => '',
            'nisn' => '124',
            'password' => \bcrypt('siswa'),
            'tempat_lahir' => 'Jambi',
            'tgl_lahir' => now(),
            'agama' => 'Islam',
            'no_telp' => '0899898',
            'alamat' => 'Jambi',
            'jenkel' => 'Laki-laki',
            'status' => '1',
            'deskripsi' => 'siswa1'
        ]);
    }
}
