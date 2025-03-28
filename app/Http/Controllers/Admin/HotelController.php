<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
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
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->role_id=2;
        $user->save();

        $path = 'assets/images/hotel';
        $myimage = $request->image->getClientOriginalName();
        $pathImage="$path/$myimage";
        $request->image->move(public_path($path), $myimage);

        $hotel=new Hotel;
        $hotel->hotel_name=$request->hotel_name;
        $hotel->hotel_town=$request->hotel_town;
        $hotel->hotel_phone=$request->hotel_phone;
        $hotel->hotel_profile=$pathImage;
        $hotel->star_number=$request->star_number;
        $hotel->user_id=$user->id;
        $hotel->save();

        return redirect()->route('admin.hotel.index')->with('success','Hotel created successfully');
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

}
