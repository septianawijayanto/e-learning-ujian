<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalEssaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_essay', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ujian_id')->references('id')->on('ujian')->onDelete('cascade');
            $table->foreignId('guru_id')->references('id')->on('guru')->onDelete('cascade');
            $table->longText('soal');
            $table->string('jenis');
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
        Schema::dropIfExists('soal_essays');
    }
}
