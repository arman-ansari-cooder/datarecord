<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/reg', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser']);
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('password.otp.send');
Route::get('verify-otp', [ForgotPasswordController::class, 'showVerifyOtpForm'])->name('password.otp.verify');
Route::post('verify-otp', [ForgotPasswordController::class, 'verifyOtp']);
Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/insert', [DashboardController::class, 'insertPage'])->name('insert');
    Route::post('/insert_validate', [DashboardController::class, 'insertValidate'])->name('insert.store');

    // Route::get('/report', [DashboardController::class, 'display'])->name('displayData');

    // routes/web.php
Route::get('/data', [DashboardController::class, 'index'])->name('data.index');
Route::get('/data/{id}/edit', [DashboardController::class, 'edit'])->name('data.edit');
Route::post('/data/{id}/update', [DashboardController::class, 'update'])->name('data.update');
Route::delete('/data/{id}', [DashboardController::class, 'destroy'])->name('data.destroy');

   

});


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
