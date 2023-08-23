<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Company\Auth\AuthenticatedController as AuthCompany;
use App\Http\Controllers\Api\Company\Auth\PasswordController as PasswordCompany;

use App\Http\Controllers\Api\User\Auth\AuthenticatedController as AuthUser;

Route::prefix('company')->group(function () {
    Route::post('register', [AuthCompany::class, 'register']);
    Route::post('login', [AuthCompany::class, 'login']);
    Route::post('reset-password', [PasswordCompany::class, 'store']);

    Route::post('/logout', [AuthCompany::class, 'logout'])->middleware('auth:sanctum');

});

Route::prefix('users')->group(function () {
    Route::post('register', [AuthUser::class, 'register']);
    Route::post('login', [AuthUser::class, 'login']);

    Route::post('/logout', [AuthUser::class, 'logout'])->middleware('auth:sanctum');
});
