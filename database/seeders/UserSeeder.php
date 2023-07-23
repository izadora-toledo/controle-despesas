<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {

        if (!User::where('id', 1)->exists()) {

            User::factory()->create([
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
            ]);
        }

        User::factory()->count(3)->create();
    }
}
