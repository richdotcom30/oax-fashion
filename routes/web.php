<?php

use Illuminate\Support\Facades\Route;

// Serve the Vue SPA - all routes return the built Vue app
Route::get('/{any}', function () {
    return file_get_contents(public_path('index.html'));
})->where('any', '.*');
