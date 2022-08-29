<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test',[\App\Http\Controllers\HomeController::class,'test'])->name('test');
Route::middleware('auth')->group(function (){
    Route::resource('category',CategoryController::class);
    Route::resource('post',PostController::class);
    Route::resource('users',\App\Http\Controllers\UserController::class);
});

