<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// C
Route::post('products', 'App\Http\Controllers\ApiController@createProduct');

// R
Route::get('products', 'App\Http\Controllers\ApiController@getAllProduct');
Route::get('products/{id}', 'App\Http\Controllers\ApiController@getProduct');

// U
Route::put('products/{id}', 'App\Http\Controllers\ApiController@updateProduct');

// D
Route::delete('products/{id}','App\Http\Controllers\ApiController@deleteProduct');
