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

Route::get('/weather', [\App\Http\Controllers\WeatherController::class, 'output']);

Route::get('/', function () { return view('input_token'); });

Route::post('/input-token', [\App\Http\Controllers\WeatherController::class, 'inputToken']);

Route::post('/type-weather', [\App\Http\Controllers\WeatherController::class, 'typeWeather'])->name('type-weather');

Route::post('/city-weather', [\App\Http\Controllers\WeatherController::class, 'cityWeather'])->name('city-weather');
