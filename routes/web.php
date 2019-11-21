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

Route::get('/chart', 'HomeController@chart');

Route::get('/viewBuku', 'bukuController@index')->name('viewBuku');

Route::post('/inserBuku', 'bukuController@insert')->name('inserBuku');        //tetep dipake http.post

Route::post('/deleteBuku', 'bukuController@delete');

Route::get('/editBuku/{id}', 'bukuController@editBuku')->name('editBuku');

Route::post('/updBuku/{id}', 'bukuController@update')->name('updBuku');

Route::get('/viewAnggota', 'anggotaController@index')->name('viewAnggota');

Route::post('/inserAgt', 'anggotaController@insert')->name('inserAgt');

Route::post('/deleteAgt', 'anggotaController@delete');

Route::get('/editAnggt/{id}', 'anggotaController@editAnggt')->name('editAnggt');

Route::get('/aktifkan/{id}', 'anggotaController@aktifkan');

Route::get('/nonaktifkan/{id}', 'anggotaController@nonaktifkan');

Route::post('/updAgt/{id}', 'anggotaController@update')->name('updAgt');

Route::get('/viewKategori', 'kategoriController@index')->name('viewKategori');

Route::post('/inserKategori', 'kategoriController@insert')->name('inserKategori');

Route::get('/editKtg/{id}', 'kategoriController@editKtg')->name('editKtg');

Route::post('/updKtg/{id}', 'kategoriController@update')->name('updKtg');

Route::post('/delKategori', 'kategoriController@delete');

Route::get('/viewUser', 'userController@index')->name('viewUser');

Route::get('/editUser/{id}', 'userController@editUser')->name('editUser');

Route::post('/updUser/{id}', 'userController@update')->name('updUser');

Route::post('/inserUser', 'userController@create')->name('inserUser');

Route::post('/deleteUser', 'userController@delete');

Route::get('/vPeminjaman', 'pinjamController@index')->name('vPeminjaman');

Route::get('/addPeminjaman', 'pinjamController@field')->name('addPeminjaman');

Route::post('/inserPinjam', 'pinjamController@insert')->name('inserPinjam');

Route::get('/vDetail/{id}', 'pinjamController@getDetails')->name('vDetail');

Route::get('/vPengembalian', 'kembaliController@index')->name('vPengembalian');

Route::get('/kembaliBuku/{id}', 'kembaliController@kembalikan')->name('kembaliBuku');

Route::post('/kembalikan', 'kembaliController@dikembalikan')->name('kembalikan');

Route::post('/inserDenda', 'kembaliController@inserDenda')->name('inserDenda');

Route::get('/vRekapan', 'kembaliController@indexRekap')->name('vRekapan');

Route::get('/dtlRekap/{id}', 'kembaliController@dtlRekap')->name('dtlRekap');
