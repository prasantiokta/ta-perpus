<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $fillable = ['jenis_id', 'kodebuku', 'judul', 'penerbit', 'penulis', 'status'];
}
