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
Route::post('/customers', 'CustomersController@store');
Route::post('/produk', 'ProdukController@store');
Route::post('/order', 'OrderController@store');


Route::get('/customers', 'CustomersController@show');
Route::post('/customers', 'CustomersController@store');

Route::get('/produk', 'ProdukController@show');
Route::post('/produk', 'ProdukController@store');

Route::get('/order', 'OrderController@show');
Route::get('/order/{id}', 'OrderController@detail');
Route::post('/order', 'OrderController@store');
Route::put('/order/{id}', 'OrderController@update');

