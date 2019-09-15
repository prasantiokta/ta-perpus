<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Peminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('kodepinjam');
            $table->unsignedbigInteger('anggota_id');
            $table->unsignedbigInteger('pustakawan_id');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('nmangg');
            $table->string('nmpust');
            //$table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('anggota_id')->references('id')->on('anggota')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('pustakawan_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
