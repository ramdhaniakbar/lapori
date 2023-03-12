<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nik' => '',
                'name' => 'Ramdhani Akbar',
                'email' => 'ramdhaniakbar@gmail.com',
                'email_verified_at' => 'ramdhaniakbar@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '',
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nik' => '',
                'name' => 'Gonalu Kaler',
                'email' => 'gonalukaler@gmail.com',
                'email_verified_at' => 'gonalukaler@gmail.com',
                'password' => Hash::make('12345678'),
                'phone' => '',
                'remember_token' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        User::insert($user);
    }
}
