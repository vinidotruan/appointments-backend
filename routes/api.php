<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'UsersController@login');
    Route::post('signup', 'UsersController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'UsersController@logout');
        Route::get('user', 'UsersController@user');
    });
    
});

Route::group([
    'middleware' => 'auth:api'

], function() {
    Route::resource('roles', 'RoleController');
});