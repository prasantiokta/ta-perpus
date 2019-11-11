<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Details extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('details', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->unsignedbigInteger('pinjam_id');
            $table->unsignedbigInteger('buku_id');
            $table->string('nmcat');
            $table->string('kodebuku');
            $table->string('judul');
            $table->string('penerbit');
            $table->string('penulis');
            $table->foreign('pinjam_id')->references('id')->on('peminjaman')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buku_id')->references('id_buku')->on('buku')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
