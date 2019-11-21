<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Denda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denda', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedbigInteger('pinjam_id');
            $table->date('tgl_dikembalikan');
            $table->integer('hari');
            $table->integer('ttl_denda');
            $table->integer('ttl_bayar');
            $table->integer('ttl_kembalian');
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
        Schema::dropIfExists('denda');
    }
}
