<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'ViewController@index');

Route::get('/create', 'ViewController@showCreateReport');
Route::post('/create', 'ViewController@createReport');

Route::get('/{id}/edit', 'ViewController@showEditReport');
Route::post('/{id}/edit', 'ViewController@editReport');

Route::get('/{id}/delete', 'ViewController@showDeleteReport');
Route::post('/{id}/delete', 'ViewController@deleteReport');

Route::get('/{id}', 'ViewController@showReport');
