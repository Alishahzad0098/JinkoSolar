<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerialController; 


Route::get('/', [SerialController::class, 'index'])->name('check.serial');
Route::post('/store', [SerialController::class, 'store'])->name('store.info');
Route::get('/solarform', [SerialController::class, 'viewform'])->name('form.solar');
Route::get('/table', [SerialController::class, 'viewtable'])->name('view.table');
Route::get('/dashboard', [SerialController::class,'dashboard'])->name('dashboard');
Route::post('/search-module', [SerialController::class, 'searchModule'])->name('search.module');