<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class)->except('users.store')->middleware(LoginMiddleware::class);
Route::post('users/store', [UserController::class, 'store'])->name('users.store');

Route::resource('groups', GroupController::class)->middleware(LoginMiddleware::class);

Route::prefix('groups/{group}/tasks')->name('tasks.')->controller(TaskController::class)->group(
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{task}', 'show')->name('show');
        Route::put('/{task}', 'update')->name('update');
        Route::delete('/{task}', 'delete')->name('destroy');

    }
)->middleware(LoginMiddleware::class);

Route::post('groups/{group}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware(LoginMiddleware::class);

Route::controller(LoginController::class)->name('login.')->group(function() {
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
    Route::get('logout', 'logout')->name('logout');
    Route::post('auth', 'auth')->name('auth');
});