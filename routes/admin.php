<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\AuthenticatedController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;

Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedController::class, 'create'])->name('admin.login');
        Route::post('login', [AuthenticatedController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('admin.password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('admin.password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('admin.password.update');
    });

    Route::middleware('auth:admin')->group(function () {
        // Route::get('/', Home::class)->name('admin.home');
        Route::get('/', function () {
            return view('admin.home');
        })->name('admin.home');
        Route::post('logout', [AuthenticatedController::class, 'destroy'])->name('admin.logout');


        Route::get('/admins', function () {
            return "admins";
        })->name('admin.admins');

        Route::get('/clientes', function () {
            return "users";
        })->name('admin.users');

        Route::get('/comentarios', function () {
            return "comments";
        })->name('admin.comments');

        Route::get('/empresas', function () {
            return "companies";
        })->name('admin.companies');

        Route::get('/reservas', function () {
            return "bookings";
        })->name('admin.bookings');
    });
});
