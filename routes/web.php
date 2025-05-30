<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('home');

    Route::get('/admin/master_users/', [UsersController::class, 'index'])->name('master_users.index');
    Route::get('/admin/master_users/create', [UsersController::class, 'create'])->name('master_users.create');
    Route::post('/admin/master_users/store', [UsersController::class, 'store'])->name('master_users.store');
    Route::get('/admin/master_users/{id}/detail', [UsersController::class, 'detail'])->name('master_users.detail');
    Route::get('/admin/master_users/{id}/edit', [UsersController::class, 'edit'])->name('master_users.edit');
    Route::put('/admin/master_users/{id}', [UsersController::class, 'update'])->name('master_users.update');
    Route::delete('/admin/master_users/{id}', [UsersController::class, 'destroy'])->name('master_users.destroy');

    Route::get('/admin/master_modules/', [ModulesController::class, 'index'])->name('master_modules.index');
    Route::get('/admin/master_modules/create', [ModulesController::class, 'create'])->name('master_modules.create');
    Route::post('/admin/master_modules/store', [ModulesController::class, 'store'])->name('master_modules.store');
    Route::get('/admin/master_modules/{id}/detail', [ModulesController::class, 'detail'])->name('master_modules.detail');
    Route::get('/admin/master_modules/{id}/edit', [ModulesController::class, 'edit'])->name('master_modules.edit');
    Route::put('/admin/master_modules/{id}', [ModulesController::class, 'update'])->name('master_modules.update');
    Route::delete('/admin/master_modules/{id}', [ModulesController::class, 'destroy'])->name('master_modules.destroy');

    Route::get('/admin/master_lessons/', [LessonsController::class, 'index'])->name('master_lessons.index');
    Route::get('/admin/master_lessons/create', [LessonsController::class, 'create'])->name('master_lessons.create');
    Route::post('/admin/master_lessons/store', [LessonsController::class, 'store'])->name('master_lessons.store');
    Route::get('/admin/master_lessons/{id}/detail', [LessonsController::class, 'detail'])->name('master_lessons.detail');
    Route::get('/admin/master_lessons/{id}/edit', [LessonsController::class, 'edit'])->name('master_lessons.edit');
    Route::put('/admin/master_lessons/{id}', [LessonsController::class, 'update'])->name('master_lessons.update');
    Route::delete('/admin/master_lessons/{id}', [LessonsController::class, 'destroy'])->name('master_lessons.destroy');

    Route::get('/admin/profile/', [UsersController::class, 'profileindex'])->name('profile.index');