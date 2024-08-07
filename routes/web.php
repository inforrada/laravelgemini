<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeminiController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/text', [GeminiController::class, 'getText'])->name('geminiGetText');
Route::get('/image', [GeminiController::class, 'getImageComment'])->name('geminiGetImage');