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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reports', 'ViewController@index');

Route::get('/reports/create', 'ViewController@showCreateReport');
Route::post('/reports/create', 'ViewController@createReport');

Route::get('/reports/{id}', 'ViewController@showReport');

Route::get('/reports/{id}/edit', 'ViewController@showEditReport');
Route::post('/reports/{id}/edit', 'ViewController@editReport');
