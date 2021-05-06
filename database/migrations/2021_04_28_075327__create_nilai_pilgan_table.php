<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPilganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_pilgan', function (Blueprint $table) {
            $table->id();
            $table->string('no_soal_id', 15);
            $table->foreignId('ujian_id')->references('id')->on('ujian')->onDelete('cascade');
            $table->foreignId('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreignId('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->string('nama', 255)->nullable();
            $table->string('pilihan', 1);
            $table->string('benar')->nullable();
            $table->string('salah')->nullable();
            $table->decimal('score');
            $table->string('status', 1);
            $table->integer('revisi')->nullable();
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
        Schema::dropIfExists('nilai_pilgan');
    }
}
