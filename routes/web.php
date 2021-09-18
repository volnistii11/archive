<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FormatController;
use \App\Http\Controllers\UsersController;
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

Route::get('test', function (){
   return 'hello world';
});

Route::get('/hello', [\App\Http\Controllers\IndexController::class, 'index']);


Route::get('/service', [\App\Http\Controllers\ServiceController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/users', UsersController::class);

Route::resource('/service/formats', FormatController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
