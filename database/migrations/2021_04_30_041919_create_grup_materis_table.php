<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grup_materi', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 50);
            $table->foreignId('grup_id')->references('id')->on('grup')->onDelete('cascade');
            $table->foreignId('materi_id')->references('id')->on('materi')->onDelete('cascade');
            $table->foreignId('guru_id')->references('id')->on('guru')->onDelete('cascade');
            $table->string('status', 10);
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
        Schema::dropIfExists('grup_materis');
    }
}
