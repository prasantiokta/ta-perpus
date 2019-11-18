<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Peminjaman;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function chart()
    //   {
    //     $result = DB::table('peminjaman')
    //                 ->orderBy('id', 'desc')
    //                 ->get();
    //     return response()->json($result);
    //   }

    public function chart()
      {
          //MENGAMBIL TANGGAL 7 HARI YANG TELAH LALU DARI TANGGAL HARI INI
          $start = Carbon::now()->subWeek()->addDay()->format('Y-m-d') . ' 00:00:01';
          //MENGAMBIL TANGGAL HARI INI
          $end = Carbon::now()->format('Y-m-d') . ' 23:59:00';
          
          //SELECT DATA KAPAN RECORDS DIBUAT DAN JUGA TOTAL PESANAN
          $order = Peminjaman::select(DB::raw('date(tgl_pinjam) as order_date'), DB::raw('count(*) as total_order'))
              //DENGAN KONDISI ANTARA TANGGAL YANG ADA DI VARIABLE $start DAN $end 
              ->whereBetween('tgl_pinjam', [$start, $end])
              //KEMUDIAN DI KELOMPOKKAN BERDASARKAN TANGGAL
              ->groupBy('tgl_pinjam')
              ->get()->pluck('total_order', 'order_date')->all();
          
          //LOOPING TANGGAL DENGAN INTERVAL SEMINGGU TERAKHIR
          for ($i = Carbon::now()->subWeek()->addDay(); $i <= Carbon::now(); $i->addDay()) {
              //JIKA DATA NYA ADA 
              if (array_key_exists($i->format('Y-m-d'), $order)) {
                  //MAKA TOTAL PESANANNYA DI PUSH DENGAN KEY TANGGAL
                  $data[$i->format('Y-m-d')] = $order[$i->format('Y-m-d')];
              } else {
                  //JIKA TIDAK, MASUKKAN NILAI 0
                  $data[$i->format('Y-m-d')] = 0;
              }
          }
        // for ($i = 0; $i <= 7; $i++) {
        //     //JIKA DATA NYA ADA 
        //     if ($order != 0) {
        //         //MAKA TOTAL PESANANNYA DI PUSH DENGAN KEY TANGGAL
        //         array_push($data,$order [$i]);
        //     } else {
        //         //JIKA TIDAK, MASUKKAN NILAI 0
        //         array_push($data,$order=0 [$i]);
        //     }
        // }
          //print_r($data);
          return response()->json($data);
      }
}
