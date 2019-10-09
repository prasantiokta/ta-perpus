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

    public function insert()
    {
        $param =  json_decode(request()->getContent(), true);
        $input = array(
            'kodeangg' => $param['kodeangg'],
            'nmangg' => $param['nmangg'],
            'notelp' => $param['notelp'],
            'alamat' => $param['alamat']
        );

        $result = DB::table('anggota')->insert($input);
    }

    public function editAnggt($id)
    {
        $result = Anggota::find($id);
        $cat = DB::table('anggota')->get();

        return view('isi.editAnggt', compact('cat', 'result'));
    }

    public function update(Request $request, $id)
    {
        $nmc = DB::table('anggota')->where('id', $request->jenis_id)->value('nmangg');

        DB::table('anggota')->where('id', $id)->update([
            'kodeangg' => $request->kodeangg,
            'nmangg' => $request->nmangg,
            'notelp' => $request->notelp,
            'alamat' => $request->alamat
        ]);
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
