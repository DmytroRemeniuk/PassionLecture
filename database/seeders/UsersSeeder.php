<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Alice',
                'email' => 'alice@example.com',
                'email_verified_at' => now(),
                'estAdmin' => '0',
                'dateEntree' => now()->toDateString(),
                'password' => Hash::make('test'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bob',
                'email' => 'bob@example.com',
                'email_verified_at' => now(),
                'estAdmin' => '0',
                'dateEntree' => now()->toDateString(),
                'password' => Hash::make('test'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'estAdmin' => '1',
                'dateEntree' => now()->toDateString(),
                'password' => Hash::make('test'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
