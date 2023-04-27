<?php

use App\Actions\Auth\AuthenticateAction;
use App\Actions\Customer\CreateCustomerAction;
use App\Actions\Customer\DeleteCustomerAction;
use App\Actions\Group\CreateGroupAction;
use App\Actions\Group\DeleteGroupAction;
use App\Actions\Group\GetAllGroupAction;
use App\Actions\Group\UpdateGroupAction;
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

Route::post('/authenticate', AuthenticateAction::class);

Route::middleware('manager.auth')->group(function () {

    Route::get('/group', GetAllGroupAction::class);
    
    Route::group(['prefix' => 'customer'], function () {
        Route::post('/', CreateCustomerAction::class);
        Route::delete('/{id}', DeleteCustomerAction::class);
    });

    Route::middleware('manager.level.two')->group(function () {
        Route::group(['prefix' => 'group'], function () {
            Route::post('/', CreateGroupAction::class);
            Route::put('/', UpdateGroupAction::class);
            Route::delete('/{id}', DeleteGroupAction::class);
        });
    });
});

