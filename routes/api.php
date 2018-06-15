<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Grupo de rotas abertas.
 */

Route::post('/user/create', 'UsersController@store');

/**
 * Grupo de rotas protegidas por autenticação.
 */
Route::middleware(['auth:api'])->group(function() {

    Route::get('/user/authenticated',   'UsersController@authenticatedUser');
    Route::post('/user/logout',         'UsersController@revokeToken');
    Route::resource('/user',       'UsersController');

});