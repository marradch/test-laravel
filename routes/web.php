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

Route::get('/add-proposal', 'ProposalController@add')->name('proposal.add');

Route::post('/proposal/store', 'ProposalController@store')->middleware('is.captcha.valid');

Route::get('/proposal/all', 'ProposalController@index')->name('proposal.all');

Route::get('/proposal/all-ajax/{page}', 'ProposalController@indexAjax');
