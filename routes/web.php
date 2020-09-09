<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', ['as' => 'home', 'uses' => 'Home@index']);
Route::get('/admin', 'Auth\LoginController@admin')->name('admin');
// Route::post('/admin', 'Auth\LoginController@postAdmin')->name('post.admin');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/login_pengguna', 'Auth\LoginController@showLoginPengguna')->name('login_pengguna');
Route::post('/login_pengguna', 'Auth\LoginController@loginPengguna')->name('login_pengguna');

Route::get('/peminjaman_buku', 'Peminjaman\PeminjamanController@index')->name('peminjaman_buku');
Route::get('/peminjaman_buku/add', 'Peminjaman\PeminjamanController@add')->name('peminjaman_buku.add');
Route::post('/peminjaman_buku/create', 'Peminjaman\PeminjamanController@create')->name('peminjaman_buku.create');
Route::get('/', 'HomeController@index')->name('dashboard');

Route::group(['prefix' => 'admin'], function () {
	Route::get('/login', 'Auth\LoginController@showLoginAdmin')->name('admin.login');
	Route::post('/login_admin', 'Auth\LoginController@loginAdmin')->name('login_admin');

	Route::group(['prefix' => 'katalog'], function () {
		Route::get('/', 'Katalog\KatalogController@add')->name('katalog.add');
		Route::post('/', 'Katalog\KatalogController@create')->name('katalog.create');
		Route::get('/edit/{id}', 'Katalog\KatalogController@edit')->name('katalog.edit');
	    Route::post('/save', 'Katalog\KatalogController@save')->name('katalog.save');
	    Route::delete('/delete', 'Katalog\KatalogController@drop')->name('katalog.delete');
	});
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');