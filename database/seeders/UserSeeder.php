<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Brayan Ocampo',
                'email' => 'zajoseza@gmail.com',
                'password' => Hash::make('joseb123'),
                'type' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Santiago Galvis Tabares',
                'email' => 'sgalvis@autonoma.edu.co',
                'password' => Hash::make('hola123'),
                'type' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Usuario',
                'email' => 'user@gmail.ocm',
                'password' => Hash::make('12345678'),
                'type' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Owner',
                'email' => 'owner@gmail.ocm',
                'password' => Hash::make('12345678'),
                'type' => 'owner',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
