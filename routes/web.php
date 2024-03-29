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

Route::get('/', 'MatchController@index');

Route::resource('roles', 'RolesController');
Route::resource('girls', 'GirlsController');
Route::resource('company', 'CompanyController');
Route::resource('match', 'MatchController');
Route::resource('match_girls', 'match_girlsController');
Route::resource('match-type', 'MatchTypeController');