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

//routes are limited for IPs of the access end points

Route::middleware(['limitIP','auth:api'])->group( function () {
    
	Route::resource('products', 'API\ProductController');
        Route::GET('productDetails/{id}', 'API\ProductController@productDetails');
        Route::GET('productListBySeller/{id}', 'API\ProductController@productListBySeller');
        Route::GET('sellerDetailsByProduct/{id}', 'API\ProductController@sellerDetailsByProduct');
        
});

Route::middleware(['limitIP'])->group( function () {
    
Route::post('register', 'API\AuthController@register');
Route::post('authentication', 'API\AuthController@authenticate');

});
