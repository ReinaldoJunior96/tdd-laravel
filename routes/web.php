<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('auth.login');
});

Route::controller(\App\Http\Controllers\ContactController::class)->group(function(){
   Route::post('cadastrar','store')->name('new.contact');
});


Route::get('/', function () {
    return view('welcome');
})->name('dashboard');
