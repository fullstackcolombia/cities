<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('create', [App\Http\Controllers\HomeController::class, 'create']);
Route::post('add', [App\Http\Controllers\HomeController::class, 'store']);
Route::get('download', [App\Http\Controllers\HomeController::class, 'newdownload']);