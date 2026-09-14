<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VictimController;
use App\Http\Controllers\AdminAuthController;

// HOME
Route::get('/', function () {
    return view('index');
});

//LOGIN
Route::get('/login', function () {
    return view('login');
});

Route::post('/victims', [VictimController::class, 'store'])
    ->name('victims.store');

//DEMAIS PÁGINAS
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

//MONITORAMENTO
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

Route::middleware('admin.access')->group(function () {

    Route::get(
        '/admin/index',
        [VictimController::class, 'adminIndex']
    )->name('admin.index');

});
