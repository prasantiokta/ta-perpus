<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Anggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('kodeangg');
            $table->string('nmangg');
            $table->string('notelp');
            $table->string('alamat');
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
        //
        Schema::dropIfExists('anggota');
    }
}
