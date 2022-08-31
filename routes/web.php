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

// La route della homepage
Route::get('/', 'HomeController@index')->name('home');

// La route attraverso la quale uso le risorse da ComicController
Route::resource('comics', 'ComicController');
