<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::create([
            'id'=>1,
            'hotel_name'=>"Onomo hotel",
            'hotel_description'=>"Onomo hotel is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
            'user_id'=>2,
            'star_number'=>4,
            'hotel_town'=>"douala",
            'hotel_profile'=>'assets/images/hotel/onomo.jpg',
            "hotel_phone"=>"678390037"
        ],
    );

    Hotel::create([
        'id'=>2,
        'hotel_name'=>"Akwa palace",
        'hotel_description'=>"Akwa palace is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
        'user_id'=>3,
        'star_number'=>4,
        'hotel_town'=>"douala",
        'hotel_profile'=>'assets/images/hotel/akwa-palace.jpg',
        "hotel_phone"=>"667463552"
    ],
);

Hotel::create([
    'id'=>3,
    'hotel_name'=>"Ibis hotel",
    'hotel_description'=>"Ibis hotel is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>4,
    'star_number'=>3,
    'hotel_town'=>"douala",
    'hotel_profile'=>'assets/images/hotel/ibis.jpg',
    "hotel_phone"=>"678039436"
],
);

Hotel::create([
    'id'=>4,
    'hotel_name'=>"Hotel la falaise",
    'hotel_description'=>"Hotel la falaise is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>5,
    'star_number'=>4,
    'hotel_town'=>"douala",
    'hotel_profile'=>'assets/images/hotel/falaise-douala.jpg',
    "hotel_phone"=>"678039436"
],
);

Hotel::create([
    'id'=>5,
    'hotel_name'=>"Hotel sawa",
    'hotel_description'=>"Hotel sawa is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>6,
    'star_number'=>3,
    'hotel_town'=>"douala",
    'hotel_profile'=>'assets/images/hotel/sawa.jpg',
    "hotel_phone"=>"678466374"
],
);

Hotel::create([
    'id'=>6,
    'hotel_name'=>"Star land",
    'hotel_description'=>"Star land is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>7,
    'star_number'=>5,
    'hotel_town'=>"douala",
    'hotel_profile'=>'assets/images/hotel/star-land.jpg',
    "hotel_phone"=>"678637734"
],
);

Hotel::create([
    'id'=>7,
    'hotel_name'=>"Residence la falaisse",
    'hotel_description'=>"Residence la falaisse is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>8,
    'star_number'=>3,
    'hotel_town'=>"douala",
    'hotel_profile'=>'assets/images/hotel/residence-falaise.jpg',
    "hotel_phone"=>"689473552"
],
);

Hotel::create([
    'id'=>8,
    'hotel_name'=>"Vallee des princes",
    'hotel_description'=>"Vallee des princes is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>9,
    'star_number'=>4,
    'hotel_town'=>"douala",
    'hotel_profile'=>'assets/images/hotel/valee.jpg',
    "hotel_phone"=>"689473552"
],
);

Hotel::create([
    'id'=>9,
    'hotel_name'=>"Noubou internationnal",
    'hotel_description'=>"Noubou internationnal is a luxurious hotel located in the heart of Douala, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>10,
    'star_number'=>4,
    'hotel_town'=>"douala",
    'hotel_profile'=>'assets/images/hotel/noubou.jpg',
    "hotel_phone"=>"689473552"
],
);

Hotel::create([
    'id'=>10,
    'hotel_name'=>"La falaise de yaounde",
    'hotel_description'=>"La falaise de yaounde is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>11,
    'star_number'=>4,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/falaise-yaounde.jpg',
    "hotel_phone"=>"6902373763"
],
);

Hotel::create([
    'id'=>11,
    'hotel_name'=>"Safyad hotel",
    'hotel_description'=>"Safyad hotel is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>12,
    'star_number'=>2,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/safyad.jpg',
    "hotel_phone"=>"692374893"
],
);

Hotel::create([
    'id'=>12,
    'hotel_name'=>"Hotel Franco",
    'hotel_description'=>"Hotel Franco is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>13,
    'star_number'=>3,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/franco.jpg',
        "hotel_phone"=>"695636738"
],
);

Hotel::create([
    'id'=>13,
    'hotel_name'=>"Hilton Hotel",
    'hotel_description'=>"Hilton Hotel is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>14,
    'star_number'=>5,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/hilton.jpg',
    "hotel_phone"=>"695636738"
],
);

Hotel::create([
    'id'=>14,
    'hotel_name'=>"Boun's hotel",
    'hotel_description'=>"Boun's hotel is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>15,
    'star_number'=>4,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/bouns.jpg',
    "hotel_phone"=>"695636738"
],
);

Hotel::create([
    'id'=>15,
    'hotel_name'=>"Massao palace hotel",
    'hotel_description'=>"Massao palace hotel is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>16,
    'star_number'=>3,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/massao.jpg',
    "hotel_phone"=>"695636738"
],
);

Hotel::create([
    'id'=>16,
    'hotel_name'=>"Hotel le fibi",
    'hotel_description'=>"Hotel le fibi is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>17,
    'star_number'=>4,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/fibi.jpg',
    "hotel_phone"=>"695636738"
],
);

Hotel::create([
    'id'=>17,
    'hotel_name'=>"Hotel la couronne RW",
    'hotel_description'=>"Hotel la couronne RW is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>18,
    'star_number'=>3,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/couronne.jpg',
    "hotel_phone"=>"695636738"
],
);

Hotel::create([
    'id'=>18,
    'hotel_name'=>"Yaahot",
    'hotel_description'=>"Yaahot is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>19,
    'star_number'=>3,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/yahot.jpg',
    "hotel_phone"=>"694636738"
],
);

Hotel::create([
    'id'=>19,
    'hotel_name'=>"Djeuga palace hotel",
    'hotel_description'=>"Djeuga palace hotel is a luxurious hotel located in the heart of Yaoundé, Cameroon. It offers a range of rooms and suites, all equipped with modern amenities and luxurious furnishings. The hotel also features a restaurant, bar, and fitness center.",
    'user_id'=>20,
    'star_number'=>2,
    'hotel_town'=>"Yaoundé",
    'hotel_profile'=>'assets/images/hotel/djeuga.jpg',
    "hotel_phone"=>"655636738"
],
);
    }
}
