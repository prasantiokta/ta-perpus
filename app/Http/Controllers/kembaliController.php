<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class kembaliController extends Controller
{
     public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        $list = DB::table('pengembalian')->orderBy('id')->where('dikembalikan','=','0')->get();
        $today = Carbon::today()->toDateString();
        //dd($today);
        return view('isi.vPengembalian', compact('list','today'));
    }

    public function kembalikan($id)
    {
        $kodeny = DB::table('pengembalian')->where('id',$id)->first();
        $kode = $kodeny->kodepinjam;
        //dd($kode);
        $upd = DB::table('peminjaman')->where('kodepinjam','=',$kode)->update(['dikembalikan' => 1]);
        if ($upd) {
        	DB::table('pengembalian')->where('id','=',$id)->update(['dikembalikan' => 1]);
        }

        return redirect('vPengembalian');
    }
}
