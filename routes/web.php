<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TermsController;
use App\Http\Controllers\PrivacyController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('terminos', [TermsController::class, 'index'])->name('terms');
Route::get('privacidad', [PrivacyController::class, 'index'])->name('privacy');

require __DIR__.'/admin.php';
