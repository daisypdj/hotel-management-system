<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\MartinController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Homecontroller::class,"homepage"]);

Route::get("/daisy",function(){
    return [

       "artircle" => "article 1"
    ];
});

Route::get('/martin', [MartinController::class,"martin"]);

Route::get('/home', [Homecontroller::class,"homepage"]);
