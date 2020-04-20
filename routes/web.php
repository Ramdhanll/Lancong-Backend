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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page-not-found', function () {
    return view('page-not-found');
});

Auth::routes();
Route::middleware(['auth','admin'])->group(function () {
   Route::resources([
	    'travelPaket' => 'TravelPackageController',
	    'travelGallery' => 'GalleryController'
	]);
   Route::get('getTravel', 'GalleryController@getTravel');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('{path}','HomeController@index')->where( 'path', '([A-z]+)?' ); // this for route in vue-route | 
});
// Route::get('{path}','HomeController@index')->where( 'path', '([A-z]+)?' ); // this for route in vue-route | 



