<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Kategori;

class kategoriController extends Controller
{
    //
    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        $category = DB::table('kategori')->get();
        $last = DB::table('kategori')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('kategori')->orderBy('id_category', 'desc')->value('id_category');
        }
        //dd($idnya);
        return view('isi.viewKategori', compact('category', 'idnya'));
    }

    public function insert()
    {
        $param =  json_decode(request()->getContent(), true);
        $input = array(
            'category' => $param['category']
        );

        $result = DB::table('kategori')->insert($input);
    }

    public function delete()
    {
        $param =  json_decode(request()->getContent(), true);
        $id = $param['id'];
        $category = Kategori::find($id);
        $category->delete();
    }
}
