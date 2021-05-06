<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugasJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugas_jawaban', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tugas_id')->references('id')->on('tugas')->onDelete('cascade');
            $table->foreignId('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->string('jenis')->nullable();
            $table->string('isi')->nullable();
            $table->string('score')->nullable();
            $table->string('status', 15);
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('tugas_jawaban');
    }
}
