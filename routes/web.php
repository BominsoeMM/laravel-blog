<?php

use App\Http\Controllers\NationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
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
    return view('index');
});
Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/page/{slug}', [PageController::class, 'page'])->name('page');
Route::get('/catpage/{category:slug}', [PageController::class, 'catpage'])->name('page.cat');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test',[\App\Http\Controllers\HomeController::class,'test'])->name('test');
Route::middleware('auth')->group(function (){
    Route::resource('category',CategoryController::class);
    Route::resource('post',PostController::class);
    Route::resource('photo',PhotoController::class);
    Route::resource('nation',NationController::class);
    Route::resource('users',UserController::class)->middleware('isAdmin');
});

