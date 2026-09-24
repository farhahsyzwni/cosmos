<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sessions', function () {
    return view('sessions');
})->name('sessions');
