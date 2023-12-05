<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/form', [UserController::class, 'index'])->name('user.index');
Route::get('/form/create', [UserController::class, 'create']);
Route::post('/form/create', [UserController::class, 'store'])->name('user.store');
Route::get('/form/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/form/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/form/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/login', [UserController::class, 'loginpage']);
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/register', [UserController::class, 'signup']);
Route::post('/register', [UserController::class, 'register'])->name('user.register');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
