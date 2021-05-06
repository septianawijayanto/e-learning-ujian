<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->string('no_induk', 10);
            $table->string('nisn', 15);
            $table->string('password');
            $table->string('username')->unique();
            $table->string('nama', 50);
            $table->string('foto')->nullable();
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('agama');
            $table->string('no_telp', 15);
            $table->text('alamat');
            $table->enum('jenkel', ['Laki-laki', 'Perempuan']);
            $table->string('status');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
