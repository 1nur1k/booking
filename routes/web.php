<?php

use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/rooms', [RoomController::class, 'index'])->middleware('guest');
Route::get('/rooms/create', [BookingController::class, 'store'])->middleware('guest');

