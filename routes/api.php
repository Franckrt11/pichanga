<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Company\Auth\AuthenticatedController as AuthCompany;
use App\Http\Controllers\Api\Company\Auth\PasswordController as PasswordCompany;

use App\Http\Controllers\Api\User\Auth\AuthenticatedController as AuthUser;
// PasswordUser

use App\Http\Controllers\Api\Company\ProfileController as ProfileCompany;
use App\Http\Controllers\Api\Company\AvatarController as AvatarCompany;
use App\Http\Controllers\Api\Company\FieldController as FieldCompany;
use App\Http\Controllers\Api\Company\FieldPictureController as PictureCompany;
use App\Http\Controllers\Api\ConfigController;

Route::get('config', [ConfigController::class, 'index'])->middleware('auth:sanctum');

Route::prefix('company')->group(function () {
    Route::post('register', [AuthCompany::class, 'register']);
    Route::post('login', [AuthCompany::class, 'login']);
    Route::post('reset-password', [PasswordCompany::class, 'store']);
    Route::post('/logout', [AuthCompany::class, 'logout'])->middleware('auth:sanctum');

    Route::get('/profile/{id}', [ProfileCompany::class, 'show'])->middleware('auth:sanctum');
    Route::post('/avatar/update/{id}', [AvatarCompany::class, 'update'])->middleware('auth:sanctum');
    Route::post('/avatar/remove/{id}', [AvatarCompany::class, 'destroy'])->middleware('auth:sanctum');

    Route::get('/fields/{id}', [FieldCompany::class, 'index'])->middleware('auth:sanctum');
    Route::get('/field/{id}', [FieldCompany::class, 'show'])->middleware('auth:sanctum');
    Route::put('/field/{id}',[FieldCompany::class, 'update'])->middleware('auth:sanctum');
    Route::post('/field/new',[FieldCompany::class, 'store'])->middleware('auth:sanctum');
    Route::post('/field/{id}/portrait',[FieldCompany::class, 'portrait'])->middleware('auth:sanctum');
    Route::delete('/field/{id}/portrait',[FieldCompany::class, 'remove'])->middleware('auth:sanctum');
    Route::patch('/field/{id}/status',[FieldCompany::class, 'changestatus'])->middleware('auth:sanctum');

    Route::get('/field/{id}/pictures', [PictureCompany::class, 'show'])->middleware('auth:sanctum');
    Route::post('/field/{id}/gallery',[PictureCompany::class, 'store'])->middleware('auth:sanctum');
    Route::delete('/field/{id}/gallery',[PictureCompany::class, 'destroy'])->middleware('auth:sanctum');
});

Route::prefix('users')->group(function () {
    Route::post('register', [AuthUser::class, 'register']);
    Route::post('login', [AuthUser::class, 'login']);

    Route::post('/logout', [AuthUser::class, 'logout'])->middleware('auth:sanctum');
});
