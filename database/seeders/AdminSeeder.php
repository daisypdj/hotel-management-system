<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>"Daisy",
            'email'=>"admin@hotelo.com",
            'role_id'=>1,
            'password'=>"password",
            'phone'=>'674849384'
        ]);
    }
}
