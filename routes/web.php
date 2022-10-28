<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
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
Route::middleware(['auth', 'update_activite'])->group(function () {
    // User
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/message', [\App\Http\Controllers\ChatController::class, 'index'])->name('message');
    //Home
    Route::get('/', [HomeController::class, 'index'])->name('home');

    //Tasks
    Route::get('task_Create', [TaskController::class, 'form'])->name('formTask');
    Route::post('task_Create', [TaskController::class, 'store'])->name('saveTask');
    Route::get('get_tasks_by_companie', [TaskController::class, 'get'])->name('getAllTaskByCompanie');
    Route::delete('delete_task', [TaskController::class, 'delete'])->name('deleteTask');

    //Teams
    Route::get('teams', [TeamController::class, 'list'])->name('allTeams');
});

Route::middleware('guest')->group(function () {
    Route::get('/connexion', function () {
        return view('users/connexion');
    })->name('login');
    Route::post('/connexion', [UserController::class, 'login'])->name('tryConnect');

    Route::get('/inscription', [UserController::class, 'formRegister'])->name('register');
    Route::post('/inscription', [UserController::class, 'saveRegister'])->name('saveRegister');
});
