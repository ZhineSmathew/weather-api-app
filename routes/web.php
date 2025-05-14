<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/weather-ui', 'weather');

Route::get('/weather/{city}', [WeatherController::class, 'show']);
