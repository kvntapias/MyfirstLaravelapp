<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::apiResource('notas', 'NotaController');

Route::post('/hello', function () {
    return view('welcome');
});