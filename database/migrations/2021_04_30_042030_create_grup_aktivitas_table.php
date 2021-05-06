<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupAktivitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_aktivitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grup_id')->references('id')->on('grup')->onDelete('cascade');
            $table->foreignId('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
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
        Schema::dropIfExists('grup_aktivitas');
    }
}
