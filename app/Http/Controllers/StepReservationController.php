<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Hotel;
use App\Models\Room_type;
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
                ->join('room__types','rooms.room__type_id','room__types.id')
                ->select('rooms.id','rooms.hotel_id','rooms.image','room__types.title','room__types.price','room__types.adult_capacity','room__types.kids_capacity')
                ->where('room__types.title',$classe)
                ->where('rooms.hotel_id',$id)
                ->get();

            return view('Hotel.step-two',compact('rooms'));
    }
}
