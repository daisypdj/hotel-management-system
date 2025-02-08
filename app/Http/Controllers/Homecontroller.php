<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function home(){
        return view("shutup");
    }
    public function homepage(){
        return view("homepage");
    }
}
