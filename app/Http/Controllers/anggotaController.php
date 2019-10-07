<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Anggota;

class anggotaController extends Controller
{
    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        $agt = DB::table('anggota')->orderBy('nmangg')->get();
        $last = DB::table('anggota')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('anggota')->orderBy('id', 'desc')->value('id');
        }
        //dd($idnya);
        return view('isi.viewAnggota', compact('agt', 'idnya'));
    }
}
