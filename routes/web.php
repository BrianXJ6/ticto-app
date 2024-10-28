<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;

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
                Route::get('functionarios', 'adminDashboardEmployeesPage')->name('employees');
                Route::get('functionarios/novo', 'adminDashboardEmployeeNewPage')->name('employees.new');
                Route::get('functionarios/atualizar/{user}', 'adminDashboardEmployeeUpdatePage')->name('employees.update');
            });

        // Employee
        Route::prefix('funcionarios')
            ->name('employee.')
            ->middleware(RoleMiddleware::class . ':employee')
            ->group(function () {
                Route::get('/', 'employeeDashboardPage')->name('dashboard');
                Route::get('alterar-senha', 'employeeChangePassPage')->name('update.pass');
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

            // Admin
            Route::prefix('admin')
                ->name('admin.')
                ->controller(AdminController::class)
                ->middleware(RoleMiddleware::class . ':admin')
                ->group(function () {
                    Route::post('employees/register', 'employeeRegister')->name('employees.register');
                    Route::put('employees/update{user}', 'employeeUpdate')->name('employees.update');
                    Route::post('employees/delete/{user}', 'employeeDelete')->name('employees.delete');
                });

            // Employee
            Route::prefix('employee')
                ->name('employee.')
                ->controller(EmployeeController::class)
                ->middleware(RoleMiddleware::class . ':employee')
                ->group(function () {
                    Route::get('points', 'listPoints')->name('point.list');
                    Route::post('points', 'registerPoints')->name('point.register');
                    Route::post('update-pass', 'updatePass')->name('update.password');
                });
        });
    });
});
