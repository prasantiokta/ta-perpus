<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Pinjam;

class pinjamController extends Controller
{
    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        $list = DB::table('peminjaman')->orderBy('id')->get();
        
        $last = DB::table('peminjaman')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('peminjaman')->orderBy('id', 'desc')->value('id');
        }
        //dd($idnya);
        return view('isi.vPeminjaman', compact('list', 'idnya'));
    }

    public function field()
    {
    	$agt = DB::table('anggota')->get();
        $last = DB::table('peminjaman')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('peminjaman')->orderBy('id', 'desc')->value('id');
        }
        //dd($idnya);
        return view('isi.addPeminjaman', compact('idnya','agt'));
    }
}
