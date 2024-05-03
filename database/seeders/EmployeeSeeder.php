<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => 'Mabi',
            'email' => 'mabi3@gmail.com',
            'cpf' => '89832909007',
            'password' => '12345678',
            'status' => 1,
        ]);
    }
}
