<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingCreateRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return $bookings;
    }

    public function store(BookingCreateRequest $request)
    {
// перенести логику в сторе и доработать логику проверки брони
        $data = $request->validated();

        // Получаем параметры из запроса
        $roomId = $data['room_id'];
        $clientId = $data['client_id'];
        $reservationFrom = $data['reservation_from'];
        $reservationTo = $data['reservation_to'];

        $isBooked = \App\Models\Booking::query()
            ->where('room_id', $roomId)
            ->where('client_id', $clientId)
            ->where('reservation_from', $reservationFrom)
            ->where('reservation_to', $reservationTo)
            ->exists();

        if (($isBooked)) {
            return redirect()->back()->withErrors(['message' => 'Номер уже забронирован на выбранные даты']);
        }

        // Создаем запись о бронировании
        $booking = new BookingController();
        $booking->client_id = $clientId;
        $booking->room_id = $roomId;
        $booking->reservation_from = $reservationFrom;
        $booking->reservation_to = $reservationTo;
        $booking->save();


        return redirect()->route('rooms')->with('message', 'Бронирование успешно создано');
    }
}
