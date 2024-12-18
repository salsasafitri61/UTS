<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin1234'), // Enkripsi password
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}




