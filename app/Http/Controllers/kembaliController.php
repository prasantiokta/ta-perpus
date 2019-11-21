<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Peminjaman;

class kembaliController extends Controller
{
     public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        $list = DB::table('peminjaman')->orderBy('id','desc')->where('dikembalikan','=','0')->get();
        $today = Carbon::today()->toDateString();
        //dd($today);
        return view('isi.vPengembalian', compact('list','today'));
    }

    public function kembalikan($id)
    {
        $mainList = DB::table('peminjaman')->where('id','=',$id)->first();
        $matchThese = ['pinjam_id' => $id, 'status' => 0];
        $list = DB::table('details')->where($matchThese)->get();

        return view('isi.prosesKembali', compact('mainList','list'));
    }

    public function dikembalikan()
    {
        $param =  json_decode(request()->getContent(), true);
        $detail = $param['detail'];
        
        for ($b=0; $b < count($detail); $b++) { 
            $gantiSts2[$b]['status'] = 1;
            $gantiny2 =  DB::table('details')->where('kodebuku','=', $detail[$b]['kodebuku'])->update($gantiSts2[$b]);
        }
        if ($gantiny2) {
            for ($a=0; $a < count($detail); $a++) { 
                $gantiSts1[$a]['status'] = 0;
                $gantiny1 =  DB::table('buku')->where('id_buku','=', $detail[$a]['id'])->update($gantiSts1[$a]);
            }
        }

        $matchThese = ['pinjam_id' => $param['id'], 'status' => 0];
        $jumlahBuku = count(DB::table('details')->where($matchThese)->get());
        if ($jumlahBuku == 0) {
            DB::table('peminjaman')->where('id','=', $param['id'])->update(['dikembalikan' => 1]);
        }
        return redirect('/vPengembalian');

    }

    public function inserDenda()
    {
        $param =  json_decode(request()->getContent(), true);
        $detail = $param['detail'];

        $input = array(
            'pinjam_id' => $param['id'],
            'tgl_dikembalikan' => $param['tgl'],
            'hari' => $param['hari'],
            'ttl_denda' => $param['denda'],
            'ttl_bayar' => $param['bayar'],
            'ttl_kembalian' => $param['kembali'],
        );

        DB::table('denda')->insert($input);
        
        for ($b=0; $b < count($detail); $b++) { 
            $gantiSts2[$b]['status'] = 1;
            $gantiny2 =  DB::table('details')->where('kodebuku','=', $detail[$b]['kodebuku'])->update($gantiSts2[$b]);
        }
        if ($gantiny2) {
            for ($a=0; $a < count($detail); $a++) { 
                $gantiSts1[$a]['status'] = 0;
                $gantiny1 =  DB::table('buku')->where('id_buku','=', $detail[$a]['id'])->update($gantiSts1[$a]);
            }
        }

        $matchThese = ['pinjam_id' => $param['id'], 'status' => 0];
        $jumlahBuku = count(DB::table('details')->where($matchThese)->get());
        if ($jumlahBuku == 0) {
            DB::table('peminjaman')->where('id','=', $param['id'])->update(['dikembalikan' => 1]);
        }
        return redirect('/vPengembalian');
    }

    public function indexRekap()
    {
        $list = DB::table('peminjaman')->orderBy('id','desc')->get();

        return view('isi.vRekapan', compact('list'));
    }

    public function dtlRekap($id)
    {
        $mainList = Peminjaman::find($id);
        $list = DB::table('details')->where('pinjam_id','=',$id)->get();
        $denda = DB::table('denda')->where('pinjam_id','=',$id)->orderBy('id','desc')->get();

        $td = $denda->sum('ttl_denda');
        $tb = $denda->sum('ttl_bayar');
        $tk = $denda->sum('ttl_kembalian');

        $length = count(DB::table('denda')->where('pinjam_id','=',$id)->get());

        //dd($denda);

        return view('isi.dtlR', compact('mainList','list','denda','td','tb','tk','length'));
    }
}
