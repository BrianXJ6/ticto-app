<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});
