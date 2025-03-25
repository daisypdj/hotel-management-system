<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Room_type;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StepReservationController extends Controller
{
    public function stepOne(Request $request){

        $hotels=Hotel::where('hotel_town',$request->location)->get();
        $request->session()->put('classe',$request->classe);
        $classes=Room_type::all();
        $array=explode(" ",$request->check);
        $checkIn=$array[0]." ".$array[1];
        $checkOut=$array[3]." ".$array[4];
        $begin=Carbon::parse($checkIn);
        $end=Carbon::parse($checkOut);
        $lenght=$end->diffInDays($begin);
        $request->session()->put('duree',$lenght);
        $request->session()->put('checkIn',$checkIn);
        $request->session()->put('checkOut',$checkOut);
        return view('Hotel.step-one',compact('hotels','classes'));

    }
        
    public function stepTwo($id,Request $request){
        $classe=$request->session()->get('classe');
        $rooms=DB::table('rooms')
                ->join('room_types','rooms.room_type_id','room_types.id')
                ->select('rooms.id','rooms.hotel_id','rooms.Room_profile','room_types.title','room_types.price','room_types.adult_capacity','room_types.kids_capacity')
                ->where('room_types.title',$classe)
                ->where('rooms.hotel_id',$id)
                ->get();

            return view('Hotel.step-two',compact('rooms'));
    }

    public function stepThree($id,Request $request){
        $checkIn=$request->session()->get('checkIn');
        $checkOut=$request->session()->get('checkOut');
        $duree=$request->session()->get('duree');
        $hotelId=$request->session()->get('id');
        $chambre=Room::find($id);
        $request->session()->put('chambreId',$id);
        $hotel=Hotel::find($chambre->hotel_id);
        $room_type=Room_type::find($chambre->room_type_id);
        //return $hotel;
        //return $room_type;
        return view('Hotel.step-final',compact('checkIn','checkOut','hotel','room_type','duree','chambre'));
    }

    public function stepFinal(Request $request){

        if($request->session()->has('reservation')){
            $request->session()->forget('reservation');
        }
        $reservation=Reservation::create([
            'chambre_id'=>$request->chambre_id,
            'check_in'=>$request->check_in,
            'check_out'=>$request->check_out,
            'duration_of_stay'=>$request->duree,
            'total_price'=>$request->price_reser,
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
        $chambre=Room::find($reservation->chambre_id);
        $hotel=Hotel::find($chambre->hotel_id);
        //return $hotel;
        return view('customer.booking-confirm',compact('reservation','hotel'));
    }
}
