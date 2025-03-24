<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<80;$i++){
            Room::create([
                'id'=>$i,
                'status'=>1,
                'hotel_id'=>rand(1,19),
                'room_type_id'=>rand(1,5),
                'Room_profile'=>"assets/images/rooms/rooms.jpg",
                'Room_price'=>rand(25000,100000),
            ],
            );
        }
    }
}
