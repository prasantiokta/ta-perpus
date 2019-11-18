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

    public function loadBayar($id)
    {
        $kembaliny = DB::table('pengembalian')->where('id','=',$id)->first();
        $getId = $kembaliny->pinjam_id;
        // dd($getId);

        $mainList = DB::table('peminjaman')->where('id','=',$getId)->first();
        $list = DB::table('details')->where('pinjam_id','=',$getId)->get();

        $arr = count($list);
        $today  = date_create(); //waktu sekarang
        $tgl = date_create($mainList->tgl_kembali); //waktu db
        $selisih  = date_diff($today, $tgl);
        $jarakny = $selisih->days;

        $denda = 1000 * $arr * $jarakny;
        //dd($denda);

        return view('isi.bayareDenda', compact('mainList','list','denda','jarakny'));
    }

    public function insert()
    {
        $param =  json_decode(request()->getContent(), true);
        $input = array(
            'kodepinjam' => $param['kode'],
            'dendany' => $param['denda'],
            'bayar' => $param['bayare'],
            'kembali' => $param['kembali'],
            'tglkembali' => $param['tglkembali'],
            'datenow' => $param['datenow'],
            'nmangg' => $param['nmangg'],
            'jarak' => $param['jarak'],
        );

        DB::table('peminjaman')->where('kodepinjam','=',$param['kode'])->update(['dikembalikan' => 1]);
        DB::table('pengembalian')->where('kodepinjam','=',$param['kode'])->update(['dikembalikan' => 1]);
        DB::table('denda')->insert($input);

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
        $a = DB::table('denda')->where('kodepinjam','=',$mainList->kodepinjam)->get();
        $denda = DB::table('denda')->where('kodepinjam','=',$mainList->kodepinjam)->first();

        $dendae = count($a);
        //dd($denda);

        return view('isi.dtlR', compact('mainList','list','denda','dendae'));
    }
}
