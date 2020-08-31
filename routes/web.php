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
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return "Cache is cleared";
});

Route::get('/', function () {return redirect('/home');});
Route::get('/{slug}', 'Pages\\PagesController@index');
Route::get('/page/{slug}', 'Pages\\PagesController@index');
Route::get('/lang/{id}', 'Pages\\PagesController@lang');
Route::get('/closemode/{slug}', 'Pages\\AuthController@closemode');

/** detail promo */
Route::get('/promo/detail/{id}', 'Pages\\PagesController@promo_detail');

/** authenticate */
Route::get('/authmode/{slug}/{token}', 'Pages\\AuthController@authmode');
