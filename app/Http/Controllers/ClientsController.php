<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    //
    public function show()
    {
        $client = Clients::where('user_id', Auth::id())->first();

        if (!$client) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        $booking = Booking::where('user_id', Auth::id())->with('room')->get();
        if ($booking->isEmpty()) {
            return response()->json(['error' => 'Booking not found'], 404);
        }


        return response()->json($client, $booking);

    }
}
