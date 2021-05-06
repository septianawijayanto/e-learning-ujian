<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiEssayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_essay', function (Blueprint $table) {
            $table->id();
            $table->integer('id_detail_soal_essay');
            $table->foreignId('ujian_id')->references('id')->on('ujian')->onDelete('cascade');
            $table->foreignId('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->longText('jawab');
            $table->decimal('score');
            $table->integer('status');
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
        Schema::dropIfExists('nilai_essay');
    }
}
