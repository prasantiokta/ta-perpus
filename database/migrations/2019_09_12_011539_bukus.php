<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bukus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->bigincrements('id_buku');
            $table->unsignedbigInteger('jenis_id');
            $table->string('kodebuku');
            $table->string('judul');
            $table->string('penerbit');
            $table->string('penulis');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('jenis_id')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
