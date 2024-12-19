<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomCreateRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(RoomCreateRequest $roomCreateRequest)
    {
        $rooms = Room::query();

        if ($roomCreateRequest->has('type')) {
            $rooms->where('type', $roomCreateRequest->type);
        }
        if ($roomCreateRequest->has('bath')) {
            $rooms->where('bath', $roomCreateRequest->bath);
        }
        if ($roomCreateRequest->has('breakfast')) {
            $rooms->where('breakfast', $roomCreateRequest->breakfast);
        }
        if ($roomCreateRequest->has('rating')) {
            $rooms->where('rating','>=', $roomCreateRequest->rating);
        }

        return $rooms->get();
    }
}
