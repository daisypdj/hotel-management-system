<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RoomSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\HotelSeeder;
use Database\Seeders\GerantSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\RoomTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            GerantSeeder::class,
            CustomerSeeder::class,
            HotelSeeder::class,
            RoomTypeSeeder::class,
            RoomSeeder::class
        ]);
    }
}
