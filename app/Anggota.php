<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //
    protected $table = 'anggota';
    protected $primaryKey = 'id_angg';
    protected $fillable = ['nmangg','kelas', 'jurusan', 'notelp', 'alamat'];
}
