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
    	$bukue = DB::table('buku')->where('status','=',0)->get();
        $last = DB::table('peminjaman')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('peminjaman')->orderBy('id', 'desc')->value('id');
        }
        
        //return response()->json($idnya);
        return view('isi.addPeminjaman', compact('idnya','agt','bukue'));
    }

    public function insert()
    {

        $param =  json_decode(request()->getContent(), true);
        $input = array(
            'kodepinjam' => $param['kode'],
            'anggota_id' => $param['anggota_id'],
            'pustakawan_id' => $param['pustakawan_id'],
            'tgl_pinjam' => $param['tglpinjam'],
            'tgl_kembali' => $param['tglkembali'],
            'nmangg' => $param['nmangg'],
            'nmpust' => $param['nmpust'],
        );

        $detail = $param['detail'];

        $result = DB::table('peminjaman')->insertGetId($input);
        if ($result) {
            # code...
            $sukses = 1;
            for ($i=0; $i <count($detail); $i++) { 
                # code...
                $inputDetail[$i]['pinjam_id'] = $result;
                $inputDetail[$i]['buku_id'] = $detail[$i]['no'];
                $inputDetail[$i]['kodebuku'] = $detail[$i]['kodebuku'];
                $inputDetail[$i]['judul'] = $detail[$i]['judul'];
                $inputDetail[$i]['penulis'] = $detail[$i]['penulis'];
                $inputDetail[$i]['penerbit'] = $detail[$i]['penerbit'];
                $result2 = DB::table('details')->insert($inputDetail[$i]);
            }
        }

        if ($result2) {
        	$input = array(
            	'kodepinjam' => $param['kode'],
            	'anggota_id' => $param['anggota_id'],
            	'pustakawan_id' => $param['pustakawan_id'],
            	'tgl_pinjam' => $param['tglpinjam'],
            	'tgl_kembali' => $param['tglkembali'],
            	'nmangg' => $param['nmangg'],
            	'nmpust' => $param['nmpust'],
        	);
        }

        //     return response()->json($data);
    }

    public function getDetails($id)
    {
        $mainList = DB::table('peminjaman')->where('id','=', $id)->get();
        $List = DB::table('details')->where('id','=', $id)->get();
        //print_r($mainList);

        return view('isi.vDetail', compact('mainList'));
    }

    // public function find(Request $request){

    //     $param =  json_decode(request()->getContent(), true);

    //     $list = $param['detail'];
        
    //     for ($i=0; $i < count($list) ; $i++) { 
    //         # code...
    //         $data = DB::table('buku')->where('id','=', $list[$i]['id'] )->get();
    //     }
    
    // }
}
