<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

            // Storage::makeDirectory('productos');
            Storage::deleteDirectory('public/storage/products');
            Storage::makeDirectory('public/storage/products');

            //Calls to seeders

            $this->call(RoleSeeder::class);
            $this->call(UserSeeder::class);

            Category::factory(8)->create();
            Tag::factory(8)->create();
            $this->call(ProductSeeder::class);
    }
}
