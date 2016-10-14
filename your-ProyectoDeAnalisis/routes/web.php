<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

    Route::get('/signup', [
        'uses' => 'AuthController@getPagRegistro',
        'as' => 'signup',
        'middleware' => 'roles',
        'roles' => ['Secretaria','Admin']
        ]);

    Route::post('/signup', [
        'uses' => 'AuthController@postPagRegistro',
        'as' => 'signup',
        'middleware' => 'roles',
        'roles' => ['Secretaria','Admin']
        ]);

    Route::get('/signin', [
        'uses' => 'Auth\LoginController@getLogeo',
        'as' => 'signin'
        ]);

    Route::post('/signin', [
        'uses' => 'Auth\LoginController@postLogeo',
        'as' => 'signin'
        ]);