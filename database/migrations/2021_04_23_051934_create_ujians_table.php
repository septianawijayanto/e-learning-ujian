<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
            $table->foreignId('guru_id')->references('id')->on('guru')->onDelete('cascade');
            $table->enum('jenis', ['Ujian', 'Latihan']);
            $table->string('paket', 50)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('waktu', 32)->nullable();
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
        Schema::dropIfExists('ujians');
    }
}
