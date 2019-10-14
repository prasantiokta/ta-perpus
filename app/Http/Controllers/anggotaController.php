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
        $agt = DB::table('anggota')->orderBy('id_angg')->get();
        $last = DB::table('anggota')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('anggota')->orderBy('id_angg', 'desc')->value('id_angg');
        }
        //dd($idnya);
        return view('isi.viewAnggota', compact('agt', 'idnya'));
    }

    public function insert()
    {
        $param =  json_decode(request()->getContent(), true);
        $input = array(
            'kodeangg' => $param['kodeangg'],
            'nmangg' => $param['nmangg'],
            'kelas' => $param['kelas'],
            'jurusan' => $param['jurusan'],
            'notelp' => $param['notelp'],
            'alamat' => $param['alamat']
        );

        $result = DB::table('anggota')->insert($input);
    }

    public function editAnggt($id)
    {
        $result = Anggota::find($id);

        return view('isi.editAnggt', compact('result'));
    }

    public function update(Request $request, $id)
    {

        $kode = substr($request->nmangg, 0, 4);
        $kode = strtoupper($kode);
        $kodenya = $kode."-".$id;

        DB::table('anggota')->where('id_angg',$id)->update([
            'kodeangg' => $kodenya,
            'nmangg' => $request->nmangg,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'notelp' => $request->notelp,
            'alamat' => $request->alamat
        ]);

        // DB::table('anggota')->where('id_angg', $id)->update([
        //     'kodeangg' => $request->kodeangg,
        //     'nmangg' => $request->nmangg,
        //     'notelp' => $request->notelp,
        //     'alamat' => $request->alamat
        // ]);
        return redirect('viewAnggota');
    }

    public function delete()
    {
        $param =  json_decode(request()->getContent(), true);
        $id = $param['id'];
        $agt = Anggota::find($id);
        $agt->delete();
    }
}
