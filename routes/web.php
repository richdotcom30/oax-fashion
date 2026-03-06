<?php

use Illuminate\Support\Facades\Route;

// Serve the Vue SPA through Vite/Laravel
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
