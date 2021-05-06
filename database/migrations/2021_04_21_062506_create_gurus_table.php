<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('no_induk', 12)->unique();
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
        Schema::dropIfExists('gurus');
    }
}
