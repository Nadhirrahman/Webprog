<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'name' => 'Yeji',
                'email' => 'Yeji@gmail.com',
                'password' => Hash::make('12345'),
                'role' => '0',
                'address' => 'rumah yeji',
                'gender' => 'female',
                'remember_token' => Str::random(),
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'name' => 'Budi',
                'email' => 'Budi@gmail.com',
                'password' => Hash::make('12345'),
                'role' => '0',
                'address' => 'rumah mamah budi',
                'gender' => 'male',
                'remember_token' => Str::random(),
                'updated_at' => now(),
                'created_at' => now()
            ],


            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => '1',
                'address' => 'rumah admin',
                'gender' => 'male',
                'remember_token' => Str::random(),
                'updated_at' => now(),
                'created_at' => now()
            ],


        ]);
    }
}
