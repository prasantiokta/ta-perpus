<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pinjamController extends Controller
{
    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        // $agt = DB::table('anggota')->orderBy('id_angg')->get();
        // $last = DB::table('anggota')->get()->count();
        // $idnya = 0;
        // if ($last == 0) {
        //     # code...
        //     $idnya = 1;
        // } else {
        //     $idnya = DB::table('anggota')->orderBy('id_angg', 'desc')->value('id_angg');
        // }
        // //dd($idnya);
        // return view('isi.viewAnggota', compact('agt', 'idnya'));
    }
}
