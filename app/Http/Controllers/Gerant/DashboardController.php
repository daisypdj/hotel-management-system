<?php

namespace App\Http\Controllers\Gerant;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $hotel=Hotel::where('user_id',auth()->user()->id)->first();
        $reservations=DB::table('rooms')
        ->join('reservations','rooms.id','reservations.room_id')
        ->join('hotels','hotels.id','rooms.hotel_id')
        ->join('users','users.id','reservations.user_id')
        ->select('reservations.id','reservations.check_in','reservations.check_out','reservations.status','reservations.total_price','reservations.user_id','hotels.hotel_name','hotels.star_number','hotels.hotel_town','reservations.room_id','rooms.Room_profile','users.name','users.email')
        ->where('reservations.status',1)
        ->where('hotels.id',$hotel->id)
        ->get();

        $reservationCount=DB::table('rooms')
        ->join('reservations','rooms.id','reservations.room_id')
        ->join('hotels','hotels.id','rooms.hotel_id')
        ->join('users','users.id','reservations.user_id')
        ->select('reservations.id','reservations.check_in','reservations.check_out','reservations.status','reservations.total_price','reservations.user_id','hotels.hotel_name','hotels.star_number','hotels.hotel_town','reservations.room_id','rooms.Room_profile','users.name','users.email')
        ->where('reservations.status',1)
        ->where('hotels.id',$hotel->id)
        ->count();
        $chambreCount=Room::where('hotel_id',$hotel->id)->count();
        return view('Hotel.dashboard',compact('reservations','reservationCount','chambreCount','hotel'));
    }
}
