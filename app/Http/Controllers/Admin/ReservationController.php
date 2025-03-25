<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index(){
        $reservations=DB::table('rooms')
                        ->join('reservations','rooms.id','reservations.room_id')
                        ->join('hotels','hotels.id','rooms.hotel_id')
                        ->join('users','users.id','reservations.user_id')
                        ->select('reservations.id','reservations.check_in','reservations.check_out','reservations.status','reservations.total_price','reservations.user_id','hotels.hotel_name','hotels.star_number','hotels.hotel_town','reservations.room_id','users.name','users.email')
                        ->where('reservations.status',1)
                        ->take(5)
                        ->get();
        return view('admin.reservation.index',compact('reservations'));
    }
}
