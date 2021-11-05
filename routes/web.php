<?php

use Illuminate\Support\Facades\Route;

Route::get('/', '\App\Http\Controllers\DashboardController@index');

Route::get('/dashboard', '\App\Http\Controllers\DashboardController@dashboard')
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__.'/auth.php';
