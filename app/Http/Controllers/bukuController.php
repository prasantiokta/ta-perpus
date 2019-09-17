<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Buku;

class bukuController extends Controller
{
    public function index()
    {
        $bukux = Buku::all();
        return view('isi.vbuku', compact('bukux'));
    }

    public function insert(Request $request)
    {
        Buku::create($request->all());
        return redirect()->back();
    }
}
