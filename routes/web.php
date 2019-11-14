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

Route::post('/inserAgt', 'anggotaController@insert')->name('inserAgt');

Route::post('/deleteAgt', 'anggotaController@delete');

Route::get('/editAnggt/{id}', 'anggotaController@editAnggt')->name('editAnggt');

Route::post('/updAgt/{id}', 'anggotaController@update')->name('updAgt');

Route::get('/viewKategori', 'kategoriController@index')->name('viewKategori');

Route::post('/inserKategori', 'kategoriController@insert')->name('inserKategori');

Route::post('/delKategori', 'kategoriController@delete');

Route::get('/viewUser', 'userController@index')->name('viewUser');

Route::post('/inserUser', 'userController@create')->name('inseruser');

Route::post('/deleteUser', 'userController@delete');

Route::get('/vPeminjaman', 'pinjamController@index')->name('vPeminjaman');

Route::get('/addPeminjaman', 'pinjamController@field')->name('addPeminjaman');

Route::post('/inserPinjam', 'pinjamController@insert')->name('inserPinjam');

Route::get('/vDetail/{id}', 'pinjamController@getDetails')->name('vDetail');

Route::get('/vPengembalian', 'kembaliController@index')->name('vPengembalian');

Route::get('/kembaliBuku/{id}', 'kembaliController@kembalikan')->name('kembaliBuku');

Route::get('/byrDenda/{id}', 'kembaliController@loadBayar')->name('byrDenda');
