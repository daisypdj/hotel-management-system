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
            'id'=>2,
            'name'=>"ondoua",
            'phone'=>"654638844",
            'email'=>"OnomoHotel@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('onomo@4'),
        ],
        );

        User::create([
            'id'=>3,
            'name'=>"nicolas",
            'phone'=>"647567594",
            'email'=>"PalaceAkwa32@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>4,
            'name'=>"Louisa",
            'phone'=>"647867594",
            'email'=>"HotelIbis@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>5,
            'name'=>"Falaise",
            'phone'=>"647867578",
            'email'=>"LaFalaiseHotel@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>6,
            'name'=>"Anguissa Kevin",
            'phone'=>"675839403",
            'email'=>"SawaHotel35@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>7,
            'name'=>"Lewis Augustin",
            'phone'=>"695636573",
            'email'=>"StarLand89@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>8,
            'name'=>"Marcel Awoudou",
            'phone'=>"689994943",
            'email'=>"ResidenceFalaise@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );


        User::create([
            'id'=>9,
            'name'=>"Djemba Gaetan",
            'phone'=>"678590994",
            'email'=>"ValleePrince@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>10,
            'name'=>"Noubou etoile",
            'phone'=>"687487384",
            'email'=>"NoubouHotel90@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>11,
            'name'=>"Lilian Mvondo",
            'phone'=>"6902373765",
            'email'=>"FalaiseYde78@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>12,
            'name'=>"Tatchuim christian",
            'phone'=>"6902373649",
            'email'=>"SafyadHotel46@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>13,
            'name'=>"louis michel",
            'phone'=>"6902376449",
            'email'=>"FrancoHotel@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>14,
            'name'=>"Mbida roland",
            'phone'=>"6902354449",
            'email'=>"HiltonHotel38@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>15,
            'name'=>"Massao edouard",
            'phone'=>"656438485",
            'email'=>"BounsHotel@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>16,
            'name'=>"Massao Gerard",
            'phone'=>"656238485",
            'email'=>"MassaoHotel@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>17,
            'name'=>"Eleanor merveille",
            'phone'=>"659238485",
            'email'=>"FibiPalace23@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>18,
            'name'=>"Marcel ekanga",
            'phone'=>"659938485",
            'email'=>"PalaceCouronne56@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>19,
            'name'=>"ntoumba esaie",
            'phone'=>"659838485",
            'email'=>"YahottHostel@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>20,
            'name'=>"elisa promesse",
            'phone'=>"659838085",
            'email'=>"DjeugaPalace78@gmail.com",
            'role_id'=>2,
            'password'=>bcrypt('password'),
        ],
        );

        User::create([
            'id'=>21,
            'name'=>"martin",
            'phone'=>"659878055",
            'email'=>"Bramslevel129@gmail.com",
            'role_id'=>3,
            'password'=>bcrypt('levelvertos'),
        ],
        );
    }
}
