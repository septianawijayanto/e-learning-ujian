<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalPilgansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_pilgan', function (Blueprint $table) {
            $table->id();
            $table->longText('soal');
            $table->foreignId('ujian_id')->references('id')->on('ujian')->onDelete('cascade');
            $table->foreignId('guru_id')->references('id')->on('guru')->onDelete('cascade');

            $table->longText('pil_a');
            $table->longText('pil_b');
            $table->longText('pil_c');
            $table->longText('pil_d');
            $table->string('kunci');
            $table->string('jenis');
            $table->integer('skor');
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
        Schema::dropIfExists('soal_pilgans');
    }
}
