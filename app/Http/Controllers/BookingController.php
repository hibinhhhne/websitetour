<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function processBooking(Request $request)
    {
        $data = $request->all();

        $tour = Tours::where('id_tour', $data['booking-local'])->first();

        $data['booking-from']       = Str::substr($data['booking-date'], 0, 10);
        $data['booking-to']         = Str::substr($data['booking-date'], 13);



        dd($data);

    }
}
