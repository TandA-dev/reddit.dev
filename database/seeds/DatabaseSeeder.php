<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('votes')->delete();
        DB::table('posts')->delete();
        DB::table('users')->delete();
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(VoteTableSeeder::class);

        Model::reguard();
    }
}
