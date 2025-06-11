<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => '1',
            'password' => Hash::make('password123'),
            'email_verified_at' => Carbon::now(),
        ]);

         User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'role' => '2',
            'password' => Hash::make('password123'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
