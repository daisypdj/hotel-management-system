<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Gerant\DashboardController as GerantDashboardController;

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

Route::get('step-one/list-hotels',[HotelController::class,'stepOne'])->name('search');

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('hotels',HotelController::class);
    Route::resource('rooms',RoomController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('gerant/dashboard',[GerantDashboardController::class,'index'])->name('gerant.dashboard');;
    //Route::resource('rooms',RoomController::class);
});


Route::get('/', [Homecontroller::class,"homepage"])->name('homepage');
require __DIR__.'/auth.php';
