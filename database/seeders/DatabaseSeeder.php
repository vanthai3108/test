<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
             'username' => 'test',
             'password' => Hash::make('password'),
             'email' => 'test@example.com',
             'full_name' => 'Test User',
             'phone_number' => '0123456789',
             'avatar_image' => 'https://i.pravatar.cc/300',
             'check_vip' => 1,
             'permission' => 1,
         ]);
    }
}
