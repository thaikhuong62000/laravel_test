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

Route::get('/', $urlBase.'IndexController@getIndexPage');
Route::post('/register', $urlBase.'IndexController@registerUser');
Route::get('/test', $urlBase.'IndexController@testEmail');

Route::get('/random', $urlBase.'RandomController@getRandomPage');
Route::get('/random/account', $urlBase.'RandomController@getRandomAccount');

