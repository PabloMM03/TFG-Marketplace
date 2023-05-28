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
            'password' => bcrypt("Admin1234"),
            'remember_token' =>'2xsew3m7PM',

        ])->assignRole('Admin');

        //Generate 10 random users
        User::factory(15)->create();
    }
}
