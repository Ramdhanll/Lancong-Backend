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



    Route::middleware('auth:api')->group(function() {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::post('/logout','AuthController@logout');
        Route::get('/getDetail/{slug}','API\DetailController@getDetail');

    });

    Route::post('/login','AuthController@login');
    Route::post('/register','AuthController@register');    
    Route::get('/getPopular','API\HomeController@getPopular');

	
	Route::post('/checkout_process/{id}','API\CheckoutController@checkout_process');

    Route::post('/getCheckout','API\CheckoutController@getCheckout');
