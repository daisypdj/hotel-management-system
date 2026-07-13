<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ReceptionnisteSeeder extends Seeder
{
    /**
     * Crée un compte de démonstration pour la réceptionniste (role_id = 4).
     */
    public function run(): void
    {
        User::create([
            'name' => 'Réceptionniste',
            'email' => 'reception@hotelo.com',
            'role_id' => 4,
            'password' => bcrypt('password'),
            'phone' => '699000000',
        ]);
    }
}
