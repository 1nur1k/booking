<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelCreateRequest;
use App\Http\Requests\RoomCreateRequest;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class AdminController extends Controller
{
    public function indexHotel()
    {
        $hotels = Hotel::all();
        return response()->json($hotels);

    }

    public function createHotel(HotelCreateRequest $hotelCreateRequest)
    {
        $hotel = new Hotel();
        $hotel->name = $hotelCreateRequest->input('name');
        $hotel->rating = $hotelCreateRequest->input('rating');
        $hotel->save();

        return response()->json(['message' => 'Hotel created']);
    }
    public function updateHotel(HotelCreateRequest $hotelCreateRequest, $id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel)
        {
            return response()->json(['message' => 'Hotel not found']);
        }
        $hotel->name = $hotelCreateRequest->input('name');
        $hotel->rating = $hotelCreateRequest->input('rating');
        $hotel->save();
        return response()->json(['message' => 'Hotel updated']);
    }
    public function destroyHotel($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel){
            return response()->json(['message' => 'Hotel not found']);
        }
        $hotel->delete();
        return response()->json(['message' => 'Hotel deleted']);
    }


    public function indexRoom($id)
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }
    public function createRoom(RoomCreateRequest $roomCreateRequest)
    {
        $room = new Room();
        $room->type = $roomCreateRequest->input('type');
        $room->hotel_id = $roomCreateRequest->input('hotel_id');
        $room->has_bathroom = $roomCreateRequest->input('has_bathroom');
        $room->has_breakfast = $roomCreateRequest->input('has_breakfast');
        $room->save();

        return response()->json(['message' => 'Room created']);
    }
    public function updateRoom(RoomCreateRequest $roomCreateRequest, $id)
    {
        $room = Room::find($id);
        if (!$room)
        {
            return response()->json(['message' => 'Room not found']);
        }
        $room->type = $roomCreateRequest->input('type');
        $room->hotel_id = $roomCreateRequest->input('hotel_id');
        $room->has_bathroom = $roomCreateRequest->input('has_bathroom');
        $room->has_breakfast = $roomCreateRequest->input('has_breakfast');
        $room->save();
        return response()->json(['message' => 'Room updated']);
    }
    public function destroyRoom($id)
    {
        $room = Room::find($id);

        if (!$room)
        {
            return response()->json(['message' => 'Room not found']);
        }
        $room->delete();
        return response()->json(['message' => 'Room deleted']);
    }
}
