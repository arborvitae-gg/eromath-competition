<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'creekygreen@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
            'first_name' => 'Creek',
            'last_name' => 'Green'
        ]);
    }
}
