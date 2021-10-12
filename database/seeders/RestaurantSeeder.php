<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'user_id' => 5,
                'name' => 'La vaca loca',
                'description' => 'Comida de vaca muy buena',
                'city' => 'Manizales',
                'phone' => '8975641',
                'category_id' => 1,
                'delivery' => 'y',
                'schedule' => 'Lunes a viernes de 4pm a 8pm',
                'latitude' => 10.9876,
                'longitude' => 12.9876,
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://www.youtube.com/',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 6,
                'name' => 'La hamburguesa loca',
                'description' => 'Ricas hamburguesas',
                'city' => 'Pereira',
                'phone' => '8975642',
                'category_id' => 2,
                'delivery' => 'n',
                'schedule' => 'Lunes a Sabdo de 2pm a 10pm',
                'latitude' => 20.9876,
                'longitude' => 22.9876,
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://www.youtube.com/',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 7,
                'name' => 'Lasaña',
                'description' => 'Lasaña muy rica',
                'city' => 'Armenia',
                'phone' => '8975643',
                'category_id' => 3,
                'delivery' => 'y',
                'schedule' => 'Lunes a viernes de 4pm a 8pm',
                'latitude' => 30.9876,
                'longitude' => 32.9876,
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://www.youtube.com/',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 5,
                'name' => 'Bandeja Paisa',
                'description' => 'Bandeja paisa muy rica',
                'city' => 'Armenia',
                'phone' => '8975644',
                'category_id' => 4,
                'delivery' => 'y',
                'schedule' => 'Lunes a viernes de 11am a 8pm',
                'latitude' => 40.9876,
                'longitude' => 42.9876,
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://www.youtube.com/',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 6,
                'name' => 'Sushi',
                'description' => 'Sushi muy rico',
                'city' => 'Pereira',
                'phone' => '8975645',
                'category_id' => 5,
                'delivery' => 'y',
                'schedule' => 'Lunes a viernes de 11am a 8pm',
                'latitude' => 50.9876,
                'longitude' => 52.9876,
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://www.youtube.com/',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 7,
                'name' => 'Cena sorpresa',
                'description' => 'Es una cena sorpresa...',
                'city' => 'Pereira',
                'phone' => '8975646',
                'category_id' => 6,
                'delivery' => 'n',
                'schedule' => 'Lunes a viernes de 11am a 8pm',
                'latitude' => 60.9876,
                'longitude' => 62.9876,
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://www.youtube.com/',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 5,
                'name' => 'Empanadas',
                'description' => 'Empanada muy ricas',
                'city' => 'Manizales',
                'phone' => '8975647',
                'category_id' => 7,
                'delivery' => 'y',
                'schedule' => 'Lunes a viernes de 11am a 8pm',
                'latitude' => 70.9876,
                'longitude' => 72.9876,
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://www.youtube.com/',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
