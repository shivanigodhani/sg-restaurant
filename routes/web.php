<?php

use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('admin/contacts', [ContactsController::class, 'contacts'])->name('admin.contacts');
Route::post('admin/contacts/send', [ContactsController::class, 'contactsSend'])->name('admin.contacts.send');

Route::get('admin/login', [LoginController::class, 'login'])->name('login');
Route::post('admin/login/check', [LoginController::class, 'logincheck'])->name('login.check');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('logout');

