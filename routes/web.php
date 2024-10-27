<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'indexPage')->name('home');

    // Guest
    Route::middleware(['guest'])->group(function () {
        Route::get('login', 'loginPage')->name('login');
        Route::get('register', 'registerPage')->name('register');
    });

    // Auth
    Route::middleware(['auth'])->group(function () {
        // Admin
        Route::prefix('admin')
            ->name('admin.')
            ->middleware(RoleMiddleware::class . ':admin')
            ->group(function () {
                Route::get('/', 'adminDashboardPage')->name('dashboard');
            });

        // Employee
        Route::prefix('funcionarios')
            ->name('employee.')
            ->middleware(RoleMiddleware::class . ':employee')
            ->group(function () {
                Route::get('/', 'employeeDashboardPage')->name('dashboard');
            });
    });

    // Actions
    Route::prefix('actions')->name('actions.')->group(function () {
        // Guest
        Route::middleware(['guest'])->group(function () {
            Route::controller(LoginController::class)->group(function () {
                Route::post('login', 'login')->name('login');
            });
            Route::controller(RegisterController::class)->group(function () {
                Route::post('register', 'register')->name('register');
            });
        });

        // Auth
        Route::middleware(['auth'])->group(function () {
            Route::controller(LoginController::class)->group(function () {
                Route::post('logout', 'logout')->name('logout');
            });
        });
    });
});
