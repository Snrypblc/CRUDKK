<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('welcome'); // Sesuaikan dengan nama file blade Anda, misalnya app.blade.php
})->where('any', '.*');
