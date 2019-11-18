<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    //
    public function __construct()
    {
        # code...
        $this->middleware('auth');
    }

    public function index()
    {
        # code...
        $userx = DB::table('users')->orderBy('id','desc')->get();
        $last = DB::table('users')->get()->count();
        $idnya = 0;
        if ($last == 0) {
            # code...
            $idnya = 1;
        } else {
            $idnya = DB::table('users')->orderBy('id', 'desc')->value('id');
        }
        return view('isi.viewUser', compact('userx', 'idnya'));
    }

    protected function validator(Request $request)
    {
        Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return redirect()->route('viewUser');
    }

    protected function create(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('viewUser')->with('status', 'Pustakawan Berhasil Ditambahkan!');
    }

    public function delete()
    {
        $param =  json_decode(request()->getContent(), true);
        $id = $param['id'];
        $userx = User::find($id);
        $userx->delete();
    }
}
