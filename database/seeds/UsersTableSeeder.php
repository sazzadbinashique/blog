<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Role;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        DB::table('role_user')->truncate();



        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();


        $admin = User::create([

        	'name'	=> 'Admin user',
        	'email' => 'amdin@gmail.com',
        	'password' => Hash::make('adminuser')

        ]);


         $author = User::create([

        	'name'	=> 'Author user',
        	'email' => 'author@gmail.com',
        	'password' => Hash::make('authoruser')

        ]);

          $user = User::create([

        	'name'	=> 'General user',
        	'email' => 'user@gmail.com',
        	'password' => Hash::make('generaluser')

        ]);


          $admin->roles()->attach($adminRole);
          $author->roles()->attach($authorRole);
          $user->roles()->attach($userRole);


         $user = User::create([
              'name'	=> 'Sazzad Bin Ashique',
              'email' => 'sazzad@gmail.com',
              'password' => bcrypt('password'),
              'admin' => 1
          ]);

          Profile::create([

              'user_id'=>$user->id,
              'avatar' =>'uploads/avatars/sazzad.jpg',
              'about'=>'I am a laravel Deveoper and i love to do coding all time ',
              'facebook'=> 'facebook.com/sazzadbinashique',
              'youtube'=>'youtube.com/sazadbinashique'
          ]);
    }
}
