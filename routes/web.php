<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', [AuthDashboardController::class, 'index'])->name('dashboard');
