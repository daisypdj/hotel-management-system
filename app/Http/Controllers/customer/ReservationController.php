<?php

namespace App\Http\Controllers\customer;

use Carbon\Carbon;
use App\Models\Room;
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
                        
                        ->select('reservations.id','reservations.check_in','reservations.check_out','reservations.status','reservations.total_price','reservations.user_id','hotels.hotel_name','hotels.star_number','hotels.hotel_town','reservations.room_id','rooms.Room_profile')
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
                ->join('room_types','rooms.room_type_id','room_types.id')
                ->select('rooms.id','rooms.hotel_id','rooms.Room_profile','room_types.title','room_types.price','room_types.adult_capacity','room_types.kids_capacity')
                ->where('room_types.title',$classe)
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

    public function stepFinal(Request $request){

        if($request->session()->has('reservation')){
            $request->session()->forget('reservation');
        }
        $reservation=Reservation::create([
            'room_id'=>$request->chambre_id,
            'check_in'=>$request->check_in,
            'check_out'=>$request->check_out,
            'duration_of_stay'=>$request->duree,
            'total_price'=>$request->price_reservation,
            'user_id'=>auth()->user()->id,
            'status'=>1,
        ]);
        if($request->session()->has('reservation')){
            $request->session()->forget('reservation');
        }
        $request->session()->put('reservation', $reservation);

        return to_route('customer.confirm');
    }

    public function confirm(Request $request){

        $reservation=$request->session()->get('reservation');
        $room=Room::find($reservation->room_id);
        $hotel=Hotel::find($room->hotel_id);
        //return $hotel;
        return view('customer.booking-confirm',compact('reservation','hotel','room'));
    }
}
