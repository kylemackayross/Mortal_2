<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \DB::table('users')->insert([
            'name' => "Kyle",
            'email' => "kyle@mo.agency",
            'password' => \Hash::make('Basilisk3-'),
            'role' => "Admin",
        ]);
    }
}
