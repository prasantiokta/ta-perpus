<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';
    protected $fillable = ['kodepinjam','anggota_id','pustakawan_id','tgl_pinjam','tgl_kembali','nmangg','nmpust'];
}
