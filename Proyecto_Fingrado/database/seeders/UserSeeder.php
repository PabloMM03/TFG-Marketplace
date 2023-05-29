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

        //Generate test seller user credentials
        User::create([
            'name' =>'Tom Holland',
            'email' =>'tom.holland@gmail.com',
            'password' => bcrypt("Tom1234"),
            'remember_token' =>'43fwj5k0TH',

        ])->assignRole('Vendedores');

        //Generate 10 random users
        User::factory(15)->create();
    }
}
