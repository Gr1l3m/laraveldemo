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

Route::post('/register', 'App\Http\Controllers\API\AuthController@register');
Route::post('/login', 'App\Http\Controllers\API\AuthController@login');

// USER
// R
Route::get('user', 'App\Http\Controllers\API\AuthController@getAllUser')->middleware('auth:api');
Route::get('user/{id}', 'App\Http\Controllers\API\AuthController@getUser')->middleware('auth:api');

// U
Route::put('user/{id}', 'App\Http\Controllers\API\AuthController@updateUser')->middleware('auth:api');

// D
Route::delete('user/{id}','App\Http\Controllers\API\AuthController@deleteUser')->middleware('auth:api');

// PRODUCT

// C
Route::post('products', 'App\Http\Controllers\ApiController@createProduct')->middleware('auth:api');

// R
Route::get('products', 'App\Http\Controllers\ApiController@getAllProduct')->middleware('auth:api');
Route::get('products/{id}', 'App\Http\Controllers\ApiController@getProduct')->middleware('auth:api');

// U
Route::put('products/{id}', 'App\Http\Controllers\ApiController@updateProduct')->middleware('auth:api');

// D
Route::delete('products/{id}','App\Http\Controllers\ApiController@deleteProduct')->middleware('auth:api');


