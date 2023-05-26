<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Generate my credentials
        User::create([
            'name' =>'Pablo Millán Montero',
            'email' =>'pablo.millan@gmail.com',
            'password' => bcrypt("123456789"),

        ])->assignRole('Admin');

        //Generate 10 random users
        User::factory(15)->create();
    }
}
