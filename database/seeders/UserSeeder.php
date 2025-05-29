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
            'status' => 'active', // Only if you added the 'status' column

        
          
        ]);
    }
    }

