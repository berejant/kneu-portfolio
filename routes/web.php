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


Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/login/complete', 'Auth\LoginController@loginComplete');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/portfolio/{teacher}', 'PortfolioViewController@show')->name('portfolio.show');
Route::get('/', 'PortfolioViewController@index')->name('index');

