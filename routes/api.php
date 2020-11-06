<?php

use Illuminate\Http\Request;

Route::post('/register', 'UserController@register'); 
Route::post('/login', 'UserController@login'); 

Route::group(['middleware' => ['jwt.verify']], function () 
{
    Route::group(['middleware' => ['api.superadmin']], function() 
    {
    Route::delete('/order/{id}', 'OrderController@destroy');
    Route::delete('/produk/{id}', 'ProdukController@destroy');
    Route::delete('/customers/{id}', 'CustomersController@destroy');
    });
    
    Route::group(['middleware' => ['api.admin']], function () 
    {
    Route::post('/customers', 'CustomersController@store');

    Route::post('/produk', 'ProdukController@store');

    Route::post('/order', 'OrderController@store');
    Route::put('/order/{id}', 'OrderController@update');
    });

    Route::get('/customers', 'CustomersController@show');
    
    Route::get('/produk', 'ProdukController@show');
    
    Route::get('/order', 'OrderController@show');
    Route::get('/order/{id}', 'OrderController@detail');
    
    
});

