<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Room_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {

        $rooms=DB::table('rooms')
        ->join('room_types','rooms.room_type_id','room_types.id')
        ->select('rooms.id','rooms.hotel_id','rooms.Room_profile','room_types.title','room_types.price','room_types.adult_capacity','room_types.kids_capacity')
        ->get();
        //return $rooms;
        return view('admin.room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room_types=Room_type::all();
        $hotels=Hotel::all();
        return view('admin.room.create',compact('hotels','room_types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = 'assets/images/chambres';
            $myimage = $request->image->getClientOriginalName();
            $pathImage="$path/$myimage";
            $request->image->move(public_path($path), $myimage);
        $chambre=new Room;
        $chambre->room__type_id=$request->type;
        $chambre->hotel_id=$request->hotel;
        $chambre->image=$pathImage;
        $chambre->status=0;
        $chambre->save();

        return to_route('admin.rooms.index')->with('success','Hotel enregistré avec success');
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
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->back()->with('danger','hotel suprimé avec success');
    }
}
