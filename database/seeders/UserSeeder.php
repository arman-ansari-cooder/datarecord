<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Admin User',
            'email' => 'phuyalbinod25@gmail.com',
            'password' => Hash::make('password123'), 
           
            // securely hash password
          
        ]);

        // Optionally create a few random users
        User::factory()->count(10)->create(); // if you have a factory
    }
    }

