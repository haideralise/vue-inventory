<?php


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

Route::post('/ingredients/{vendor}/', 'IngredientController@store');
Route::post('/ingredients/{vendor}/{ingredient}', 'IngredientController@update');
Route::delete('/ingredients/{vendor}/{ingredient}', 'IngredientController@destroy');

Route::post('/vendors', 'VendorController@store');
Route::post('/vendors/{vendor}', 'VendorController@update');

Route::get('listing/{listing}', 'ListingController@get_listing_api');

