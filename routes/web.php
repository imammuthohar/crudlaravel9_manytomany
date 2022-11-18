<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;



Route::get('/', function () {
    return view('welcome');
});

/**
 * @path /users
 * @method GET
 */

// Route::get     ('/users', [\App\Http\Controllers\UserController::class]);

Route::resource('/users', \App\Http\Controllers\UserController::class);
Route::resource('/roles', \App\Http\Controllers\UserRoleController::class);
