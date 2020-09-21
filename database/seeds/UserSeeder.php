<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([

            'name' => "Admin",

            'email' => 'superadmin@gmail.com',

            'password' => bcrypt('admin123'),
            
            'user_role' => 'admin',


        ]);

        DB::table('users')->insert([

            'name' => "HR Admin",

            'email' => 'hradmin@gmail.com',

            'password' => bcrypt('admin123'),
            
            'user_role' => 'hradmin',


        ]);
    }
}

  