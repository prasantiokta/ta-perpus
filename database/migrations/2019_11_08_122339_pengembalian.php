<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengembalian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedbigInteger('pinjam_id');
            $table->string('kodepinjam');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('nmangg');
            $table->string('nmpust');
            $table->boolean('dikembalikan')->default(0);
            $table->timestamps();
            $table->foreign('pinjam_id')->references('id')->on('peminjaman')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalian');
    }
}
