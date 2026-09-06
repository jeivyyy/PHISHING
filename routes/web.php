<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

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

