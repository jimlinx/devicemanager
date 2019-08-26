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

Route::delete('devicetype/{id}', 'API\DeviceTypeController@delete');
Route::delete('location/{id}', 'API\LocationController@delete');
Route::delete('mqttserver/{id}', 'API\MqttserverController@delete');
Route::delete('pinlayout/{id}', 'API\PinlayoutController@delete');
Route::delete('site/{id}', 'API\SiteController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
