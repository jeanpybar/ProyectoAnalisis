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

// Route::get('/', function () {
//     return view('principal');
// });

   Route::group(['middleware' => 'web'], function () {


    Route::get('/', [
        'middleware' => 'roles',  
        function () {
            return view('principal');
        }])->name('main');
     
    // Route::get('/signup', [
    //     'uses' => 'AuthController@getPagRegistro',
    //     'as' => 'signup',
    //     'middleware' => 'roles',
    //     'roles' => ['Docente','Admin']
    //     ]);

    // Route::post('/signup', [
    //     'uses' => 'AuthController@postPagRegistro',
    //     'as' => 'signup',
    //     'middleware' => 'roles',
    //     'roles' => ['Docente','Admin']
    //     ]);

    Route::get('/signin', [
        'uses' => 'Auth\LoginController@getLogeo',
        'as' => 'signin'
        ]);

    Route::post('/signin', [
        'uses' => 'Auth\LoginController@postLogeo',
        'as' => 'signin'
        ]);

    Route::post('/signinErr', [
        'uses' => 'Auth\ErrorAuthController@getPagLogeoError',
        'as' => 'signinErr'
        ]);

    Route::get('/signinErr', [
        'uses' => 'Auth\ErrorAuthController@getPagLogeoError',
        'as' => 'signinErr'
        ]);

      Route::get('/logout', [
        'uses' => 'Auth\LoginController@logout',
        'as' => 'logout'
        ]);
});