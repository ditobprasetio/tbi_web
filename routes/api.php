<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
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


/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/** page - engine */
Route::post('/page-engine/data/{slug}', 'Pages\\EngineController@data');
Route::post('/page-engine/update/{id}', 'Pages\\EngineController@update');
/** page - config */
Route::post('/page-config/data/{slug}/{langcode}', 'Pages\\ConfigController@data');
Route::post('/page-config/update/{id}', 'Pages\\ConfigController@update');

/** page - content/faq */
Route::post('/page-faq/data/{lang}', 'Pages\\FaqController@data');

Route::post('/album/all', 'Gallery\\ApiAlbumController@all');
Route::post('/gallery/data', 'Gallery\\ApiGalleryController@data');

// ** User **/
//Route::post('register', 'SystemAuth\\AuthController@register');
//Route::post('login', 'SystemAuth\\AuthController@authenticate');
Route::get('open', 'DataController@open');

