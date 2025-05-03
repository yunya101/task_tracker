<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class)->except(['index']);
Route::resource('groups', GroupController::class)->except(['index']);

Route::prefix('groups/{group}/tasks')->name('tasks.')->controller(TaskController::class)->group(
    function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{task}', 'show')->name('show');
        Route::put('/{task}', 'update')->name('update');
        Route::delete('/{task}', 'delete')->name('destroy');

    }
);

Route::post('groups/{group}/comments', [CommentController::class, 'store'])->name('comments.store');

Route::view('login', 'login');
Route::view('register', 'register');
