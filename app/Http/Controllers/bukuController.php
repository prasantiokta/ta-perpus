<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Buku;

class bukuController extends Controller
{

    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        $bukux = DB::table('buku')->orderBy('judul')
        ->join('kategori','kategori.id','=','buku.jenis_id')
        ->get();
        $category = DB::table('kategori')->get();
        $last = DB::table('buku')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('buku')->orderBy('id', 'desc')->value('id');
        }
        //dd($idnya);
        return view('isi.viewBuku', compact('bukux','category','idnya'));
    }

    public function insert()
    {
        $param =  json_decode(request()->getContent(), true);
        $input = array(
                'kodebuku' => $param['kode'],
                'jenis_id' => $param['jenis_id'],
                'judul' => $param['judul'],
                'penulis' => $param['penulis'],
                'penerbit' => $param['penerbit']
            );

        $result = DB::table('buku')->insert($input);
    }
    
}
