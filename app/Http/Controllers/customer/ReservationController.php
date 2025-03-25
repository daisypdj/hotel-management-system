<?php

namespace App\Http\Controllers\customer;

use App\Models\Room_type;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations=DB::table('rooms')
                        ->join('reservations','rooms.id','reservations.room_id')
                        ->join('hotels','hotels.id','rooms.hotel_id')
                        
                        ->select('reservations.id','reservations.check_in','reservations.check_out','reservations.status','reservations.price_reser','reservations.user_id','hotels.hotel_name','hotels.star_number','hotels.hotel_town','reservations.room_id','rooms.image')
                        ->where('reservations.user_id',auth()->user()->id)
                        ->where('reservations.status',1)
                        ->get();
        return view('customer.my-reservations',compact('reservations'));
    }

    public function fast(){

        $hotels=Hotel::all();
        $classes=Room_Type::all();
        return view('customer.reservation-fast',compact('hotels','classes'));
    }
}
