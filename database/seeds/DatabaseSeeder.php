<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Seeds\PostsTableSeeder;
use Illuminate\Database\Seeds\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call([
//             UserSeeder::class,
             PostSeeder::class
         ]);
    }
}
