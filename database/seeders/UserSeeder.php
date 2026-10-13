<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['username' => 'admin'],
            [
                'id_user' => DB::table('users')
                    ->where('username', 'admin')
                    ->value('id_user') ?? Str::uuid(),

                'name' => 'Admin',
                'password' => Hash::make('admin123'),
                'role' => 'Admin',
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
