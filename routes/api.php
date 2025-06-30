<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\API\AuthController;

// ✅ Authentication Routes


Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    
    // ✅ Protected Routes (Only for authenticated users)
    Route::middleware('auth:sanctum')->group(function () {
        
         Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
   
});
Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('sendOtp');
// Route::post('/forgot-password', [AuthController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/verify-otp-reset-password', [AuthController::class, 'verifyOtpAndResetPassword'])->name('verifyOtpAndResetPassword');;
Route::get('/users', [AuthController::class, 'index']);
Route::post('/send-whatsapp', [AuthController::class, 'sendMessage'])->name('sendMessage');
// Route::post('/send-whatsapp', [AuthController::class, 'sendMessage']);