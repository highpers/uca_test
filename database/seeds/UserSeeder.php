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
        DB::table('users')->insert([

            'name' => 'Admin',
            'email' => 'admin@uca.edu.ar',
            'password' => bcrypt('1234')
        ]);
    }
}

