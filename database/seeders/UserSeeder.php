<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'role_id' => 1
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '12345678',
            'role_id' => 2
        ]);
    }
}
