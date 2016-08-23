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
        $users = [
            ['email'=>'anthony@codeup.com', 'name'=>'Anthony', 'password'=>'Anthony'],
            ['email'=>'tyler@codeup.com', 'name'=>'Tyler', 'password'=>'Tyler'],
        ];
        foreach($users as $user){
            $user1 = new App\User();
            $user1->email = $user['email'];
            $user1->name = $user['name'];
            $user1->password = Hash::make($user['password']);
            $user1->save();
        }

      factory(App\User::class, 50)->create();

    //   $users = [
    //   ['email'=>'anthony@codeup.com', 'name'=>'Anthony', 'password'=>'Anthony'],
    //   ['email'=>'luis@codeup.com', 'name'=>'Luis', 'password'=>'Luis'],
    //   ['email'=>'cameron@codeup.com', 'name'=>'Cameron', 'password'=>'Cameron'],
    //   ['email'=>'tyler@codeup.com', 'name'=>'Tyler', 'password'=>'Tyler'],
    //   ['email'=>'scott@codeup.com', 'name'=>'Scott', 'password'=>'Scott'],
    //   ['email'=>'emily@codeup.com', 'name'=>'Emily', 'password'=>'Emily'],
    //   ['email'=>'anna@codeup.com', 'name'=>'Anna', 'password'=>'Anna'],
    //   ['email'=>'phillip@codeup.com', 'name'=>'Phillip', 'password'=>'Phillip'],
    //   ['email'=>'john@codeup.com', 'name'=>'John', 'password'=>'John'],
    //   ['email'=>'craig@codeup.com', 'name'=>'Craig', 'password'=>'Craig'],
    //   ['email'=>'brandon@codeup.com', 'name'=>'Brandon', 'password'=>'Brandon']
    // ];

    //   foreach($users as $user){
    //     $user1 = new App\User();
    //     $user1->email = $user['email'];
    //     $user1->name = $user['name'];
    //     $user1->password = Hash::make($user['password']);
    //     $user1->save();
    //     // User::create($user);
    //   }

      factory(App\User::class, 50)->create();

    }
}
