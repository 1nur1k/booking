<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingCreateRequest;
use App\Http\Requests\RoomCreateRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(RoomCreateRequest $roomCreateRequest, BookingCreateRequest $bookingCreateRequest)
    {
        $query = Room::query();
        // Создается фильтр
        if ($roomCreateRequest->has('type')) {
            $query->where('type', $roomCreateRequest->input('type'));
        }

        if ($roomCreateRequest->has('bathroom')) {
            $query->where('has_bathroom', $roomCreateRequest->input('bathroom'));
        }

        if ($roomCreateRequest->has('breakfast')) {
            $query->where('has_breakfast', $roomCreateRequest->input('breakfast'));
        }

        if ($bookingCreateRequest->has(['start_date', 'end_date']))
        {
            $start_date = $bookingCreateRequest->input('start_date');
            $end_date = $bookingCreateRequest->input('end_date');

            $query->whereDoesntHave('bookings', function ($checking) use ($start_date, $end_date) {
                $checking->where('start_date', '<', $end_date)
                    ->where('end_date', '>', $start_date);
            });

            $rooms = $query->get();

            return response()->json($rooms);
        }
    }
}
