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

Route::get('/', $urlBase . 'MainController@index');
Route::post('/submit', $urlBase . 'MainController@submitRegisterInfo');
Route::get('/submit', $urlBase . 'MainController@submitRegisterInfo');
Route::get('/test', $urlBase . 'MainController@test');
