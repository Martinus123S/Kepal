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

use App\Http\Controllers\Controller;

Route::get('/home', 'IndexController@userIndex')->name('user.home');
Route::get('/belanja', 'IndexController@userBelanja')->name('user.belanja');

Auth::routes();
// {
//     return view('welcome');
// });
Route::get('/verify', function () {
    return view('auth.verify');
})->name('verify');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', 'Auth\RegisterController@create')->name('register');
Route::post('/verify', 'Auth\RegisterController@verify')->name('verify');

Route::get('/pesan', function () {
    return view('user.pesan');
});


// Route::get('/user/home', 'HomeController@index')->name('user.home');
Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('/pembayaran/{id}', 'PembayaranController@updatePembayaran')->name('konfirmasi');
    Route::get('/pembatalan/{id}', 'PembayaranController@batalkanPembayaran')->name('batalkan');
});
Route::get('/userPembayaran', 'PembayaranController@user');
Route::get('/produks/add', 'AddProduk@create');
Route::get('/produks', 'AddProduk@index')->name('produk.index');
Route::post('/produks/add', 'AddProduk@insert');
Route::get('/produks/edit/{id}', 'AddProduk@edit')->name('produk.edit');
Route::post('/produks/update/{id}', 'AddProduk@update')->name('produk.update');
Route::get('/produks/delete/{id}', 'AddProduk@delete')->name('produk.delete');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/produk/addToCart{id}', 'CartController@insert')->name('produk.inToCart');
Route::get('/delete{id}', 'CartController@delete')->name('cart.delete');
Route::post('/update{id}', 'CartController@update')->name('cart.update');

Route::get('/pesan', 'PesanController@index')->name('pesanan.index');
Route::post('/pesanan-insert', 'PesanController@insert')->name('pesanan.insert');
Route::get('/data-pesanan', 'PesanController@view')->name('pesanan.view');
Route::get('/data-pesanan{id}/detail', 'PesanController@detail')->name('pesanan.detail');

Route::get('/data-pesanan/{id}/pembayaran', 'PembayaranController@index')->name('pembayaran.index');
Route::post('/data-pesanan/bayar', 'PembayaranController@bayar')->name('pembayaran.bayar');
