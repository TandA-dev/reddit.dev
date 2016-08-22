<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    //
      $users = [
      ['email'=>'anthony@codeup.com', 'name'=>'Anthony', 'password'=>'Anthony'],
      ['email'=>'tyler@codeup.com', 'name'=>'Tyler', 'password'=>'Tyler']
    ];

      foreach($users as $user){
        $user1 = new App\User();
        $user1->email = $user['email'];
        $user1->name = $user['name'];
        $user1->password = Hash::make($user['password']);
        $user1->save();
        // User::create($user1);
      }

      factory(App\User::class, 50)->create();

    }
}
