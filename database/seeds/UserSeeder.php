<?php

namespace Illuminate\Database\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        factory(User::class,5)->create();
    }

}
