<?php

namespace App\Http\Controllers\customer;

use Carbon\Carbon;
use App\Models\Hotel;
use App\Models\Room_type;
use App\Models\Reservation;
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

    public function cancel($id){

        $reservation=Reservation::find($id);
        $reservation->update([
            'status'=>0,
        ]);


        return redirect()->back()->with('cancel','reservation annulée');
    }

     public function fastStore(Request $request){

        $classe=$request->classe;
        $rooms=DB::table('rooms')
                ->join('room__types','rooms.room__type_id','room__types.id')
                ->select('rooms.id','rooms.hotel_id','rooms.image','room__types.title','room__types.price','room__types.adult_capacity','room__types.kids_capacity')
                ->where('room__types.title',$classe)
                ->where('rooms.hotel_id',$request->hotel)
                ->get();
        
        $begin=Carbon::parse($request->checkIn);
        $end=Carbon::parse($request->checkOut);
        $lenght=$end->diffInDays($begin);
        $request->session()->put('duree',$lenght);
        $request->session()->put('checkIn',$request->checkIn);
        $request->session()->put('checkOut',$request->checkOut);
        return view('Hotel.step-two',compact('rooms'));
    }   
}
