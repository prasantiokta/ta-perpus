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
        $bukux = DB::table('buku')->orderBy('id_buku','desc')
            ->join('kategori', 'kategori.id_category', '=', 'buku.jenis_id')
            ->get();
        $category = DB::table('kategori')->get();
        $last = DB::table('buku')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('buku')->orderBy('id_buku', 'desc')->value('id_buku');
            $idnya = $idnya + 1;
        }
        //dd($idnya);
        return view('isi.viewBuku', compact('bukux', 'category', 'idnya'));
    }

    public function insert()
    {
        $param =  json_decode(request()->getContent(), true);
        $input = array(
            'kodebuku' => $param['kode'],
            'jenis_id' => $param['jenis_id'],
            'judul' => $param['judul'],
            'penulis' => $param['penulis'],
            'penerbit' => $param['penerbit'],
            'nmcat' => $param['nmcat']
        );

        $result = DB::table('buku')->insert($input);
    }

    public function editBuku($id)
    {
        $result = Buku::find($id);
        $cat = DB::table('kategori')->get();

        return view('isi.editBuku', compact('cat', 'result'));
    }

    public function update(Request $request, $id_buku)
    {

        // $message = [
        //     'required' => ':attribute tidak boleh kosong'
        // ];
        // request()->validate([
        //     'jenis_id' => 'required',
        //     'judul' => 'required',
        //     'penulis' => 'required',
        //     'penerbit' => 'required'
        // ], $message);

        //kode & nmcat generate
        $nmc = DB::table('kategori')->where('id_category',$request->jenis_id)->value('category');
        $kode = substr($request->judul, 0, 4);
        $kode = strtoupper($kode);
        $kodenya = $kode."-".$id_buku;

        DB::table('buku')->where('id_buku',$id_buku)->update([
            'jenis_id' => $request->jenis_id,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'nmcat' => $nmc,
            'kodebuku' => $kodenya
        ]);

        return redirect('viewBuku');
    }

    public function delete()
    {
        $param =  json_decode(request()->getContent(), true);
        $id = $param['id'];
        $bukux = Buku::find($id);
        $bukux->delete();
    }
}
