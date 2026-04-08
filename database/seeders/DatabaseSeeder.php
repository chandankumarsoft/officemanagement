<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name'      => 'System Administrator',
            'email'     => 'admin@officemanagement.com',
            'password'  => Hash::make('Admin@1234'),
            'role'      => 'admin',
            'is_active' => true,
        ]);

        // HR user
        User::create([
            'name'      => 'HR Manager',
            'email'     => 'hr@officemanagement.com',
            'password'  => Hash::make('Hr@1234'),
            'role'      => 'hr',
            'is_active' => true,
        ]);

        // Employee user
        User::create([
            'name'      => 'John Employee',
            'email'     => 'employee@officemanagement.com',
            'password'  => Hash::make('Employee@1234'),
            'role'      => 'employee',
            'is_active' => true,
        ]);
    }
}
