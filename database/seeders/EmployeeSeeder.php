<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        Employee::insert($employee);
    }
}
