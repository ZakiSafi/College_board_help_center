<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // database/seeders/DatabaseSeeder.php
    public function run()
    {
        \App\Models\Student::create([
            'name' => 'Zakiullah',
            'email' => 'zakiullahsafi0@gmail.com',
            'password' => bcrypt('safi@123'),
            'role' => 'admin',
            'date_of_birth' => '2003-06-09',
            'passport_number' => 'P123456999',
            // other required student fields
        ]);
        \App\Models\Student::create([
            'name' => 'Matiullah',
            'email' => 'matiullah@gmail.com',
            'password' => bcrypt('mati@123'),
            'role' => 'admin',
            'date_of_birth' => '2000-01-01',
            'passport_number' => 'P123456789',
            // other required student fields
        ]);

        // Create regular student accounts...
    }
}
