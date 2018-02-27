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
Route::prefix('v1')->group(function () {
	Route::post('search', 'Api\SearchApi@getSearchData');

	Route::prefix('venue')->group(function () {
		Route::get('getvenuetype/{venueKind}', 'Api\Administrator\VenueApi@getVenueTypeByVenueKind');
	});
	Route::prefix('area')->group(function () {
		Route::get('getcitybyprovince/{id}', 'Api\Administrator\AreaApi@getCityByProvince');
		Route::get('getdistrictbycity/{id}', 'Api\Administrator\AreaApi@getDistrictByCity');
	});
});