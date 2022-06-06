<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* DB::table('users')-> insert([
            'name' => 'admin',
            'lname' => 'admin',
            'tel' => 66611122,
            'age' => 20,
            'gender' => 'Prefiero no decirlo',
            'person' => 'trainer',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('trainer1234!')
        ]); */
    }
}
