<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GerantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>"Daira",
            'email'=>"daira@hotelo.com",
            'role_id'=>2
            'password'=>"password",
            'phone'=>'697768574'
        ]);
    }
}
