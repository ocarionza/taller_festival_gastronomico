<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class APIRestaurantTest extends TestCase
{
    use RefreshDatabase;

    public function test_add_restaurant()
    {

        $this->artisan("migrate:fresh --seed");

        $RestaurantData = [
                'user_id' => 1,
                'name' => 'pruebas api',
                'description' => 'se esta corriendo un test para crear restaurante',
                'city' => 'Manizales',
                'phone' => '1234567894',
                'category_id' => 1,
                'delivery' => 'y',
                'schedule' => 'test Lunes a viernes de 4pm a 8pm',
                'latitude' => 10.9876,
                'longitude' => 12.9876,
                'logo' => "Asados.jpg",
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'twitter' => 'https://twitter.com/',
                'youtube' => 'https://www.youtube.com/'
        ];

        $this->json('POST', 'api/v1/restaurants', $RestaurantData, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJsonStructure([
                "data" => [
                    'user_id',
                    'name',
                    'description',
                    'city',
                    'phone',
                    'category_id',
                    'delivery',
                    'schedule',
                    'latitude',
                    'longitude',
                    'logo',
                    'facebook',
                    'twitter',
                    'instagram',
                    'youtube',
                    'created_at',
                    'updated_at',
                    'id'
                ],
            ]);
    }

    public function test_put_restaurant()
    {
        $id = 8;

        $RestaurantUpdateData = [
            'user_id' => 1,
            'name' => 'test update',
            'description' => 'se esta corriendo un test para actualizar un restaurante',
            'city' => 'Manizales',
            'phone' => '1234567894',
            'category_id' => 1,
            'delivery' => 'y',
            'schedule' => 'test Lunes a viernes de 4pm a 8pm',
            'latitude' => 10.9876,
            'longitude' => 12.9876,
            'logo' => "Asados.jpg",
            'facebook' => 'https://www.facebook.com/',
            'instagram' => 'https://www.instagram.com/',
            'twitter' => 'https://twitter.com/',
            'youtube' => 'https://www.youtube.com/'
        ];

        $this->json('PUT', '/api/v1/restaurants/' . $id, $RestaurantUpdateData, ['Accept' => 'application/json'])
        ->assertStatus(200)
        ->assertJson([ 
            "data"=>[
                'name' => 'test update',
                'description' => 'se esta corriendo un test para actualizar un restaurante'
            ],
        ]);
    }

    public function test_get_restaurant()
    {
        $id = 8;
        $response = $this->json('GET','/api/v1/restaurants/' . $id, []);
        $response->assertStatus(200);
        $response->assertJson([ "data"=>[
                                    'user_id' => 1,
                                    'name' => 'test update',
                                    'description' => 'se esta corriendo un test para actualizar un restaurante',
                                    'city' => 'Manizales'
                                ]
                            ]);
    }
}
