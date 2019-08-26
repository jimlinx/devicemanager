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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/device', 'DeviceController@index');
Route::put('/device', 'DeviceController@store');
Route::post('/device', 'DeviceController@storeOne');

Route::get('/devicetype', 'DevicetypeController@index');
Route::put('/devicetype', 'DevicetypeController@store');

Route::get('/location', 'LocationController@index');
Route::put('/location', 'LocationController@store');

Route::get('/mqttserver', 'MqttserverController@index');
Route::put('/mqttserver', 'MqttserverController@store');

Route::get('/pinlayout', 'PinlayoutController@index');
Route::put('/pinlayout', 'PinlayoutController@store');
Route::post('/pinlayout', 'PinlayoutController@storeOne');

Route::get('/sensortype', 'SensortypeController@index');
Route::put('/sensortype', 'SensortypeController@store');

Route::get('/site', 'SiteController@index');
Route::put('/site', 'SiteController@store');