<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Room_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels=Hotel::all();
        return view('admin.hotel.list',compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotel.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
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
        $rooms=DB::table('chambres')
                ->join('room__types','chambres.room__type_id','room__types.id')
                ->select('chambres.id','chambres.hotel_id','chambres.image','room__types.title','room__types.price','room__types.adult_capacity','room__types.kids_capacity')
                ->where('room__types.title',$classe)
                ->where('chambres.hotel_id',$id)
                ->get();

            return view('Hotel.step-two',compact('rooms'));
    }
}
