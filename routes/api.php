<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ConfigController;
use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\MessageController;

// Company
use App\Http\Controllers\Api\Company\Auth\AuthenticatedController as AuthCompany;
use App\Http\Controllers\Api\Company\Auth\PasswordController as PasswordCompany;
use App\Http\Controllers\Api\Company\ProfileController as ProfileCompany;
use App\Http\Controllers\Api\Company\AvatarController as AvatarCompany;
use App\Http\Controllers\Api\Company\LocationController as LocationCompany;
use App\Http\Controllers\Api\Company\FieldController as FieldCompany;
use App\Http\Controllers\Api\Company\FieldPictureController as PictureCompany;
use App\Http\Controllers\Api\Company\ActivityController as ActivityCompany;
use App\Http\Controllers\Api\Company\FieldRecordController as FieldRecordCompany;
use App\Http\Controllers\Api\Company\ReserveController as ReserveCompany;

// User
use App\Http\Controllers\Api\User\Auth\AuthenticatedController as AuthUser;
// PasswordUser
use App\Http\Controllers\Api\User\ProfileController as ProfileUser;
use App\Http\Controllers\Api\User\AvatarController as AvatarUser;
use App\Http\Controllers\Api\User\LocationController as LocationUser;
use App\Http\Controllers\Api\User\FieldController as FieldUser;
use App\Http\Controllers\Api\User\ReserveController as ReserveUser;
use App\Http\Controllers\Api\User\ActivityController as ActivityUser;

Route::prefix('company')->group(function () {
    Route::post('register', [AuthCompany::class, 'register']);
    Route::post('login', [AuthCompany::class, 'login']);
    Route::post('change-password', [PasswordCompany::class, 'store'])->middleware('auth:sanctum');
    Route::post('logout', [AuthCompany::class, 'logout'])->middleware('auth:sanctum');

    Route::get('activity/{id}', [ActivityCompany::class, 'show'])->middleware('auth:sanctum');

    Route::get('profile/{id}', [ProfileCompany::class, 'show'])->middleware('auth:sanctum');
    Route::put('profile/update/{id}', [ProfileCompany::class, 'update'])->middleware('auth:sanctum');
    Route::post('avatar/update/{id}', [AvatarCompany::class, 'update'])->middleware('auth:sanctum');
    Route::post('avatar/remove/{id}', [AvatarCompany::class, 'destroy'])->middleware('auth:sanctum');
    Route::put('config/{id}', [ProfileCompany::class, 'config'])->middleware('auth:sanctum');

    Route::get('locations/{id}', [LocationCompany::class, 'index'])->middleware('auth:sanctum');
    Route::get('location/{id}', [LocationCompany::class, 'show'])->middleware('auth:sanctum');
    Route::put('location/{id}',[LocationCompany::class, 'update'])->middleware('auth:sanctum');
    Route::post('location/new',[LocationCompany::class, 'store'])->middleware('auth:sanctum');
    Route::patch('location/{id}/status',[LocationCompany::class, 'changestatus'])->middleware('auth:sanctum');

    Route::get('fields/{id}', [FieldCompany::class, 'index'])->middleware('auth:sanctum');
    Route::get('field/{id}', [FieldCompany::class, 'show'])->middleware('auth:sanctum');
    Route::put('field/{id}',[FieldCompany::class, 'update'])->middleware('auth:sanctum');
    Route::post('field/new',[FieldCompany::class, 'store'])->middleware('auth:sanctum');
    Route::post('field/{id}/portrait',[FieldCompany::class, 'portrait'])->middleware('auth:sanctum');
    Route::delete('field/{id}/portrait',[FieldCompany::class, 'remove'])->middleware('auth:sanctum');
    Route::patch('field/{id}/status',[FieldCompany::class, 'changestatus'])->middleware('auth:sanctum');
    Route::get('field/{id}/days',[FieldRecordCompany::class, 'showdays'])->middleware('auth:sanctum');
    Route::post('field/{id}/days',[FieldRecordCompany::class, 'storedays'])->middleware('auth:sanctum');
    Route::put('field/{id}/days',[FieldRecordCompany::class, 'updatedays'])->middleware('auth:sanctum');

    Route::get('field/{id}/hours', [FieldRecordCompany::class, 'showhours'])->middleware('auth:sanctum');
    Route::post('field/{id}/hours',[FieldRecordCompany::class, 'storehours'])->middleware('auth:sanctum');
    Route::put('field/{id}/hours', [FieldRecordCompany::class, 'updatehours'])->middleware('auth:sanctum');

    Route::get('field/{id}/prices', [FieldRecordCompany::class, 'showprices'])->middleware('auth:sanctum');
    Route::post('field/{id}/prices', [FieldRecordCompany::class, 'storeprices'])->middleware('auth:sanctum');
    Route::put('field/{id}/prices', [FieldRecordCompany::class, 'updateprices'])->middleware('auth:sanctum');

    Route::get('field/{id}/pictures', [PictureCompany::class, 'show'])->middleware('auth:sanctum');
    Route::post('field/gallery',[PictureCompany::class, 'store'])->middleware('auth:sanctum');
    Route::put('field/gallery/{id}',[PictureCompany::class, 'update'])->middleware('auth:sanctum');
    Route::delete('field/{id}/gallery',[PictureCompany::class, 'destroy'])->middleware('auth:sanctum');

    Route::get('reserves/{id}', [ReserveCompany::class, 'index'])->middleware('auth:sanctum');
    Route::get('reserve/{id}', [ReserveCompany::class, 'show'])->middleware('auth:sanctum');
    Route::put('reserve/{id}', [ReserveCompany::class, 'update'])->middleware('auth:sanctum');
    Route::get('reserve/{id}/next', [ReserveCompany::class, 'next'])->middleware('auth:sanctum');
});

Route::prefix('client')->group(function () {
    Route::post('register', [AuthUser::class, 'register']);
    Route::post('login', [AuthUser::class, 'login']);
    Route::post('google-login', [AuthUser::class, 'googlelogin']);
    Route::post('facebook-login', [AuthUser::class, 'facebooklogin']);

    Route::post('logout', [AuthUser::class, 'logout'])->middleware('auth:sanctum');

    Route::get('activity/{id}', [ActivityUser::class, 'show'])->middleware('auth:sanctum');

    Route::get('profile/{id}', [ProfileUser::class, 'show'])->middleware('auth:sanctum');
    Route::put('profile/update/{id}', [ProfileUser::class, 'update'])->middleware('auth:sanctum');
    Route::post('avatar/update/{id}', [AvatarUser::class, 'update'])->middleware('auth:sanctum');
    Route::post('avatar/remove/{id}', [AvatarUser::class, 'destroy'])->middleware('auth:sanctum');
    Route::put('config/{id}', [ProfileUser::class, 'config'])->middleware('auth:sanctum');

    Route::get('field/{id}', [FieldUser::class, 'show'])->middleware('auth:sanctum');
    Route::get('field/{id}/days', [FieldUser::class, 'showdays'])->middleware('auth:sanctum');
    Route::get('field/{id}/pictures', [FieldUser::class, 'picture'])->middleware('auth:sanctum');
    Route::post('fields/nearby', [LocationUser::class, 'nearby'])->middleware('auth:sanctum');

    Route::get('reserves/{id}', [ReserveUser::class, 'index'])->middleware('auth:sanctum');
    Route::get('reserve/{id}', [ReserveUser::class, 'show'])->middleware('auth:sanctum');
    Route::post('reserve', [ReserveUser::class, 'store'])->middleware('auth:sanctum');
    Route::delete('reserve/{id}', [ReserveUser::class, 'destroy'])->middleware('auth:sanctum');
});

Route::get('config', [ConfigController::class, 'index'])->middleware('auth:sanctum');

Route::get('countries', [ConfigController::class, 'showcountries'])->middleware('auth:sanctum');
Route::get('cities/{id}', [ConfigController::class, 'showcities'])->middleware('auth:sanctum');
Route::get('districts/{id}', [ConfigController::class, 'showdistricts'])->middleware('auth:sanctum');

Route::get('chat', [ChatController::class,'index'])->middleware('auth:sanctum');
Route::post('chat', [ChatController::class,'store'])->middleware('auth:sanctum');
Route::get('chat/{id}', [ChatController::class,'show'])->middleware('auth:sanctum');

Route::get('chat/room/{user}/{company}', [ChatController::class,'showroom'])->middleware('auth:sanctum');
Route::post('chat/room', [ChatController::class,'store'])->middleware('auth:sanctum');

Route::get('chat/message/{id}', [MessageController::class,'show'])->middleware('auth:sanctum');
Route::post('chat/message', [MessageController::class,'store'])->middleware('auth:sanctum');
