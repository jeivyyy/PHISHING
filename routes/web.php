<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VictimController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [VictimController::class, 'store'])
    ->name('victims.store');


Route::get('/discover', function () {
    return view('discover');
});

Route::get('/matches', function () {
    return view('matches');
});

Route::get('/chats', function () {
    return view('chats');
});

Route::get('/profile', function () {
    return view('profile');
});

