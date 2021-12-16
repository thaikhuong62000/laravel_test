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
$urlBase = "App\Http\Controllers\\";

Route::get('/', $urlBase.'FootballController@index');
Route::get('/info', $urlBase.'AccountController@getInfo');
Route::post('/submit', $urlBase.'AccountController@submitBetInfo');
Route::get('/submit', $urlBase.'AccountController@submitBetInfo');
