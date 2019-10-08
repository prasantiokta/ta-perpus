<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('template');
});

Route::get('/viewBuku', 'bukuController@index')->name('viewBuku');

Route::post('/inserBuku', 'bukuController@insert')->name('inserBuku');        //tetep dipake http.post

Route::post('/deleteBuku', 'bukuController@delete');

Route::get('/editBuku/{id}', 'bukuController@editBuku')->name('editBuku');

Route::post('/updBuku/{id}', 'bukuController@update')->name('updBuku');

Route::get('/viewAnggota', 'anggotaController@index')->name('viewAnggota');
