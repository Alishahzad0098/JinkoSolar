<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerialController;


Route::get('/', [SerialController::class, 'index'])->name('check.serial');
Route::post('/store', [SerialController::class, 'store'])->name('store.info');
Route::get('/solarform', [SerialController::class, 'viewform'])->name('form.solar');
Route::get('/table', [SerialController::class, 'viewtable'])->name('view.table');// Authentication routes
Route::get('/login', [SerialController::class, 'showLogin'])->name('login');
Route::post('/login', [SerialController::class, 'login'])->name('login.post');
Route::get('/register', [SerialController::class, 'showRegister'])->name('register');
Route::post('/register', [SerialController::class, 'register'])->name('register.post');
Route::post('/search-module', [SerialController::class, 'searchModule'])->name('search.module');
Route::put('/module/{id}', [SerialController::class, 'update'])->name('update.module');
Route::get('/module/{id}/edit', [SerialController::class, 'edit'])->name('edit.module');
Route::delete('/module/{id}', [SerialController::class, 'destroy'])->name('delete.module');
Route::get('/solar-admin', [SerialController::class, 'view'])->name('view.admin');
Route::post('/logout', [SerialController::class, 'logout'])->name('logout');
Route::get('/dashboard', [SerialController::class, 'dashboard'])->name('dashboard')->middleware('auth');