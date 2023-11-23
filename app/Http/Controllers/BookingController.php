<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function processBooking(Request $request)
    {
//        if(!Auth::guard('client')->check()){
//            return redirect()->route('login');
//        }
        $data = $request->all();
        $query = Tours::query();
       
        if($data['tour_location'] != null){
            $query->where('id_tinh_thanh', $data['tour_location']);
        }
        $tour = $query->get();

        return view('client.page.tour', compact('tour'));
    }
}
