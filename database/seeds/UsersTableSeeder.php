<?php

use Logotips\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muxammadamin',
            'email' => 'tolipov717@gmail.com',
            'password' => Hash::make('22061998'),
            'role' => 'admin'
        ]);
    }
}
