<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::post('/login', [GuestController::class, 'login'])->name('login');
