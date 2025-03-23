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
                'status'=>0,
                'hotel_id'=>rand(1,19),
                'room__type_id'=>rand(1,5),
                'image'=>"assets/images/rooms/rooms.jpg",
            ],
            );
        }
    }
}
