<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::created([
            'name' => 'Walter Vivar',
            'email' => 'walter@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
