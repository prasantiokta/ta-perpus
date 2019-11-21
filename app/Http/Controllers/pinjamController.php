<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use Illuminate\Support\Facades\DB;
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
        $list = DB::table('peminjaman')->orderBy('id','desc')->where('dikembalikan','=','0')->get();

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
        $agt = DB::table('anggota')->where('status', '=', 1)->get();
        $bukue = DB::table('buku')->where('status', '=', 0)->get();
        $last = DB::table('peminjaman')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('peminjaman')->orderBy('id', 'desc')->value('id');
            $idnya = $idnya + 1;
        }

        //return response()->json($idnya);
        return view('isi.addPeminjaman', compact('idnya', 'agt', 'bukue'));
    }

    public function insert()
    {
        // saving form
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
        //

        // arraynya
        $detail = $param['detail'];

        $result = DB::table('peminjaman')->insertGetId($input); //save form ambil id yang baru di save

        //save array
        if ($result) {
            # code...
            $sukses = 1;
            for ($i = 0; $i < count($detail); $i++) {
                # code...
                $inputDetail[$i]['pinjam_id'] = $result;
                $inputDetail[$i]['buku_id'] = $detail[$i]['id'];
                $inputDetail[$i]['nmcat'] = $detail[$i]['kategori'];
                $inputDetail[$i]['kodebuku'] = $detail[$i]['kodebuku'];
                $inputDetail[$i]['judul'] = $detail[$i]['judul'];
                $inputDetail[$i]['penulis'] = $detail[$i]['penulis'];
                $inputDetail[$i]['penerbit'] = $detail[$i]['penerbit'];
                $result2 = DB::table('details')->insert($inputDetail[$i]);
            }
        }

        if ($sukses=1) {
            for ($a=0; $a < count($detail); $a++) { 
                $gantiSts[$a]['status'] = 1;
                $gantiny =  DB::table('buku')->where('id_buku','=', $detail[$a]['id'])->update($gantiSts[$a]);
            }
        }

        //     return response()->json($data);
    }

    public function getDetails($id)
    {
        $mainList = Peminjaman::find($id);
        $list = DB::table('details')->where('pinjam_id','=',$id)->get();

        return view('isi.vDetail', compact('mainList','list'));
    }
}
