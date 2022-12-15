<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DesignerController;
use App\Http\Controllers\GardenerController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('/proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('gardener', GardenerController::class);
Route::resource('designer', DesignerController::class);
Route::resource('user', UserController::class);
