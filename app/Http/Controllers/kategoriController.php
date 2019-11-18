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
        $category = DB::table('kategori')->orderBy('id_category', 'desc')->get();
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

    public function editKtg($id)
    {
        $result = Kategori::find($id);

        return view('isi.editKtg', compact('result'));
    }

    public function update(Request $request, $id)
    {
        DB::table('kategori')->where('id_category', $id)->update([
            'category' => $request->category
        ]);

        return redirect('viewKategori');
    }

    public function delete()
    {
        $param =  json_decode(request()->getContent(), true);
        $id = $param['id'];
        $category = Kategori::find($id);
        $category->delete();
    }
}
