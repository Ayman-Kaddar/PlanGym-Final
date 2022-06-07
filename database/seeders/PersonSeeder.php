<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                
        DB::table('people')-> insert([
            'name' => 'admin',
            'lname' => 'admin',
            'tel' => 66611122,
            'age' => 20,
            'gender' => 'Prefiero no decirlo',
            'role' => 'trainer',
            'id_user' => 1,
        ]);
    }
}
