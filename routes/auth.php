<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\LoginGoogleController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::get('/register/company', [RegisteredUserController::class, 'create_company'])
        ->name('registercompany');

    Route::get('/register/type', [RegisteredUserController::class, 'user_type'])
        ->name('type');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->name('store');

    Route::post('/register/company', [RegisteredUserController::class, 'store_company'])
        ->name('store_company');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');

    Route::get('/login/google/redirect', [LoginGoogleController::class, 'redirectToProvider'])
            ->name('login.google');
});

Route::group(['middleware' => 'auth'], function() {
    Route::group(['middleware' => 'throttle:6,1'], function() {
        Route::group(['middleware' => 'signed'], function() {
            Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->name('verification.verify');
        });

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->name('verification.send');
    });

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/register/company/complete', [RegisteredUserController::class, 'create_company_two'])
        ->name('complete.company');

    Route::post('/register/company/complete', [RegisteredUserController::class, 'store_company'])
        ->name('complete.company.post');
});
    Route::get('/login/google/callback', [LoginGoogleController::class, 'handleProviderCallback']);

