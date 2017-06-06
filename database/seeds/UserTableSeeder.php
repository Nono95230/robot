<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       DB::table('users')->insert([
            [
                'name' => 'Nono95230',
                'email' => 'arnaud.bach1987@gmail.com',
                'password' => bcrypt('ab123456'),
                'role'=> 'administrator'
            ],
            [
                'name' => 'Kenshiro222',
                'email' => 'kenshiro222@hotmail.com',
                'password' => bcrypt('ab123456'),
                'role'=> 'editor'
            ],

    	]);
    }
}
