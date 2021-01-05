<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//pesan
Route::get('/pesans',"PesanController@getPesan");
Route::post('/pesans',"PesanController@addPesan");
Route::delete('pesans/{id}',"PesanController@deletePesan");
Route::put('pesans/{id}',"PesanController@updatePesan");
