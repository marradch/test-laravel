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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/make-request', 'UserRequestController@add')->name('request.add');

Route::post('/user-request/store', 'UserRequestController@store');

Route::get('/user-request/all', 'UserRequestController@index')->name('request.all');
