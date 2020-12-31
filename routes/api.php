<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\Api\Auth'
], function() {
    Route::post('/login', 'AuthController@login');
    Route::get('/user', 'AuthController@user')->middleware('auth:sanctum');
});

Route::group([
    'prefix' => 'contacts',
    'namespace' => 'App\Http\Controllers\Api\Contacts',
    'middleware' => 'auth:sanctum'
], function() {
    Route::get('', 'ContactsController@index');
    Route::get('{contactId}', 'ContactsController@show');
});
