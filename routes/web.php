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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('employers', \App\Http\Controllers\EmployerController::class)
    ->except('show');
Route::resource('positions', \App\Http\Controllers\PositionController::class)
    ->except('show');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
