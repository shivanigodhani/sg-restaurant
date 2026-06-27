<?php

use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UsersController::class, 'index'])->name('index');


Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('admin/contacts', [ContactsController::class, 'contacts'])->name('admin.contacts');
Route::post('admin/contacts/send', [ContactsController::class, 'contactsSend'])->name('admin.contacts.send');

Route::get('admin/events', [EventsController::class, 'index'])->name('admin.events');
Route::post('admin/events/store', [EventsController::class, 'store'])->name('admin.events.store');
Route::get('/admin/events/{id}/edit', [EventsController::class, 'edit'])->name('admin.events.edit');
Route::post('admin/events/{event}',[EventsController::class,'update'])->name('admin.events.update');
Route::delete('/admin/events/{id}', [EventsController::class, 'delete'])->name('admin.events.delete');

Route::get('admin/reservation', [ReservationController::class, 'index'])->name('admin.reservation');
Route::post('admin/reservation/store', [ReservationController::class, 'store'])->name('admin.reservation.store');
Route::get('/admin/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('admin.reservation.edit');
Route::post('admin/reservations/update/{id}',[ReservationController::class,'update'])->name('admin.reservation.update');
Route::delete('/admin/reservation/{id}', [ReservationController::class, 'delete'])->name('admin.events.delete');
Route::get('/admin/reservations/{id}', [ReservationController::class, 'show'])->name('admin.reservation.show');

Route::get('/events/{slug}', [EventsController::class, 'show'])->name('events.show');

Route::get('admin/login', [LoginController::class, 'login'])->name('login');
Route::post('admin/login/check', [LoginController::class, 'logincheck'])->name('login.check');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('logout');
