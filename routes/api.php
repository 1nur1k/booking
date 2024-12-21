<?php

use App\Http\Controllers\Admin\AdminController;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientsController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Маршрут для фильтров номеров
Route::get('/rooms', [RoomController::class, 'index']);
// Маршрут для бронирования номера
Route::get('/rooms/create',[BookingController::class,'store']);
// Маршрут профиля клиента
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ClientsController::class, 'show']);
});
Route::middleware('auth:api')->group(function ()
{
    // Админ маршрут для отеля
    Route::get('/admin/hotel', [AdminController::class, 'indexHotel']);
    Route::post('/admin/hotel', [AdminController::class, 'createHotel']);
    Route::put('/admin/hotel/{id}', [AdminController::class, 'updateHotel']);
    Route::delete('/admin/hotel/{id}', [AdminController::class, 'deleteHotel']);

    // Админ маршрут для номеров
    Route::get('/admin/rooms', [AdminController::class, 'indexRoom']);
    Route::post('/admin/rooms', [AdminController::class, 'createRoom']);
    Route::put('/admin/rooms/{id}', [AdminController::class, 'updateRoom']);
    Route::delete('/admin/rooms/{id}', [AdminController::class, 'deleteRoom']);
});

