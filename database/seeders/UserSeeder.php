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
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'),
                'type' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Usuario1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('12345678'),
                'type' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Usuario2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('12345678'),
                'type' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Usuario3',
                'email' => 'user3@gmail.com',
                'password' => Hash::make('12345678'),
                'type' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Owner1',
                'email' => 'owner1@gmail.com',
                'password' => Hash::make('12345678'),
                'type' => 'owner',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Owner2',
                'email' => 'owner2@gmail.com',
                'password' => Hash::make('12345678'),
                'type' => 'owner',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Owner3',
                'email' => 'owner3@gmail.com',
                'password' => Hash::make('12345678'),
                'type' => 'owner',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
