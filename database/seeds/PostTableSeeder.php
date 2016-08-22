<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)->create();
    }
}
