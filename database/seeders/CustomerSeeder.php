<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>"level",
            'email'=>"level@hotelo.com",
            'role_id'=>3,
            'password'=>"password",
            'phone'=>'690394365'
        ]);
    }
}
