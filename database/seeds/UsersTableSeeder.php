<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([

        	'name' => 'admin',

        	'password' => bcrypt('11111111'),

        	'email' => 'admin@forum.com',

        	'admin' => 1,

        	'avatar' => asset('avatars/avatar.png')

        ]);
    }
}
