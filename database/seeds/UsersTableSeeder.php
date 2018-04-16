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
        \App\User::create([
            'name'  => 'Librarian',
            'email' =>  'librarian@email.com',
            'password'  =>  bcrypt('123456'),
            'password'  =>  bcrypt('123456')
        ]);
    }
}
