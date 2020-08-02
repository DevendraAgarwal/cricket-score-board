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

Route::get('/', 'ScoreBoardController@index')->name('home');

Route::resource('team', 'TeamController')->names('teams');
Route::resource('player', 'PlayerController')->names('player');
Route::resource('match', 'MatchController')->names('matches');
