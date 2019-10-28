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
        $userx = DB::table('users')->orderBy('id')->get();
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return view('isi.viewUser');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return view('isi.viewUser');
    }
    public function delete()
    {
        $param =  json_decode(request()->getContent(), true);
        $id = $param['id'];
        $userx = User::find($id);
        $userx->delete();
    }
}
