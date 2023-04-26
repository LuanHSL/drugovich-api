<?php

use App\Http\Controllers\CreateCustumerServer;
use App\Http\Controllers\CreateGroupServer;
use App\Http\Controllers\DeleteCustumerServer;
use App\Http\Controllers\DeleteGroupServer;
use App\Http\Controllers\ListGroupServer;
use App\Http\Controllers\LoginServer;
use App\Http\Controllers\UpdateGroupServer;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', LoginServer::class);

Route::middleware('manager.auth')->group(function () {

    Route::get('/group', ListGroupServer::class);
    
    Route::group(['prefix' => 'customer'], function () {
        Route::post('/', CreateCustumerServer::class);
        Route::delete('/{id}', DeleteCustumerServer::class);
    });

    Route::middleware('manager.level.two')->group(function () {
        Route::group(['prefix' => 'group'], function () {
            Route::delete('/{id}', DeleteGroupServer::class);
            Route::post('/', CreateGroupServer::class);
            Route::put('/', UpdateGroupServer::class);
        });
    });
});

