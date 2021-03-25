<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('posts')->insert([
//            'name' => Str::random(10).'@gmail.com',
//            'price' => 345345,
//            'desc' => 'testory opis',
//            'user_id' => 1,
//        ]);
        factory(Post::class,5)->create();
    }
}
