<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('back')->group(function (){
    Route::prefix('admin')->name('admin.')->group(function (){
        Route::prefix('auth')->name('auth.')->controller(\App\Http\Controllers\Back\AuthController::class)->group(function (){
            Route::post('login', 'authenticate')->name('login');
            Route::post('info', 'myInfo')->name('info')->middleware('auth:sanctum');
            Route::post('password', 'password')->name('password')->middleware('auth:sanctum');
            Route::post('logout', 'logout')->name('logout')->middleware('auth:sanctum');
        });
        Route::prefix('user')->name('user.')->middleware('auth:sanctum')
            ->controller(\App\Http\Controllers\Back\AdminUserController::class)->group(function (){
            Route::post('index', 'index')->name('index');
            Route::post('create', 'store')->name('create');
            Route::post('display', 'show')->name('display');
            Route::post('modify', 'update')->name('modify');
            Route::post('delete', 'destroy')->name('delete');
        });
        Route::prefix('role')->name('role.')->middleware('auth:sanctum')
            ->controller(\App\Http\Controllers\Back\AdminRoleController::class)->group(function (){
            Route::post('index', 'index')->name('index');
            Route::post('create', 'store')->name('create');
            Route::post('display', 'show')->name('display');
            Route::post('modify', 'update')->name('modify');
            Route::post('delete', 'destroy')->name('delete');
        });
        Route::prefix('menu')->name('menu.')->middleware('auth:sanctum')
            ->controller(\App\Http\Controllers\Back\AdminMenuController::class)->group(function (){
            Route::post('index', 'index')->name('index');
            Route::post('create', 'store')->name('create');
            Route::post('display', 'show')->name('display');
            Route::post('modify', 'update')->name('modify');
            Route::post('delete', 'destroy')->name('delete');
            Route::post('tree', 'tree')->name('tree');
        });

    });
});
