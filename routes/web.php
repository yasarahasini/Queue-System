<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TokenController;
use App\Models\Token;

// Public display page
Route::get('/', function () {
    $serving = Token::where('status', 'serving')->first();
    return view('welcome', compact('serving'));
});

// Generate token
Route::post('/generate-token', [TokenController::class, 'generateToken'])
    ->name('generate');

// Admin panel
Route::get('/admin', [TokenController::class, 'adminDashboard'])
    ->name('admin');

// Call next token
Route::post('/call-next', [TokenController::class, 'callNext'])
    ->name('next');
