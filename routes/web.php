<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::middleware(['auth','update_activite'])->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::middleware('guest')->group(function() {
    Route::get('/connexion', function () {
        return view('users/connexion');
    })->name('login');
    Route::post('/connexion', [UserController::class, 'login'])->name('tryConnect');

    Route::get('/inscription', [UserController::class, 'formRegister'])->name('register');
    Route::post('/inscription', [UserController::class, 'saveRegister'])->name('saveRegister');
});

