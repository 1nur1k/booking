<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingCreateRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
    }

    public function store(BookingCreateRequest $bookingCreateRequest)
    {
// перенести логику в сторе и доработать логику проверки брони
        $data = $bookingCreateRequest->validated();

        // Получаем параметры из запроса
        $roomId = $data['room_id'];
        $clientId = $data['client_id'];
        $startdate = $data['start_date'];
        $enddate = $data['end_date'];

        $isBooked = \App\Models\Booking::query()
            ->where('room_id', $roomId)
            ->where('client_id', $clientId)
            ->where('start_date', $startdate)
            ->where('end_date', $enddate)
            ->exists();

        if (($isBooked)) {
            return redirect()->back()->withErrors(['message' => 'Номер уже забронирован на выбранные даты']);
        }

        // Создаем запись о бронировании
        $booking = new BookingController();
        $booking->client_id = $clientId;
        $booking->room_id = $roomId;
        $booking->start_date = $startdate;
        $booking->end_date = $enddate;
        $booking->save();


        return redirect()->route('rooms')->with('message', 'Бронирование успешно создано');
    }
}
