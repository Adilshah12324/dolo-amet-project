<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role_id'          => 1,
                'name'             => 'super admin',
                'email'            => 'superadmin@superadmin.com',
                'email_verified_at'=> now(),
                'password'         => Hash::make('superadmin'),
                'remember_token'   => Str::random(10),

                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'role_id'          => 2,
                'name'             => 'admin',
                'email'            => 'admin@admin.com',
                'email_verified_at'=> now(),
                'password'         => Hash::make('admin'),
                'remember_token'   => Str::random(10),

                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            [
                'role_id'          => 2,
                'name'             => 'admin1',
                'email'            => 'admin1@admin1.com',
                'email_verified_at'=> now(),
                'password'         => Hash::make('admin1'),
                'remember_token'   => Str::random(10),

                'created_at'       => now(),
                'updated_at'       => now(),
            ],

        ]);
    }
}
