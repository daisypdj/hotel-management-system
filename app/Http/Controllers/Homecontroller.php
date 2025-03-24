<?php

namespace App\Http\Controllers;

use App\Models\Room_type;
use App\Models\Hotel;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home(){
        return view("shutup");
    }
    public function homepage(){
        $ids=['2','4','10','13']; //Liste des id des Hotels en vedette
        $arrayHotel=[];
        for($i=0;$i<count($ids);$i++){

            $hotel=Hotel::find($ids[$i]);
            array_push($arrayHotel,$hotel);
        }
        $classes=Room_type::all();
        //return $arrayHotel;
        return view('homepage',compact('arrayHotel','classes'));

    }
}
