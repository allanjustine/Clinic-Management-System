<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'gender' => "Other",
            'age' => null,
            'userType' => 1,
            'phone' => "+639177052937",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "Dr. Joseph Arthur",
            'email' => "doctor@gmail.com",
            'gender' => "Male",
            'age' => 25,
            'userType' => 2,
            'phone' => "+639123456789",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => "Paula Moringa",
            'email' => "secretary@gmail.com",
            'gender' => "Female",
            'age' => 26,
            'userType' => 3,
            'phone' => "+639123456789",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
