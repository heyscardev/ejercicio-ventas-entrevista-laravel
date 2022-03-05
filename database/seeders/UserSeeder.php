<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'name' =>'carlos',
                'email' => 'carloshernandez@gmail.com',
                'password' => Hash::make('12345678.'),
                'role' => 'cliente',
            ]);
            User::create([
                'name' => 'betty',
                'email' => 'bby@gmail.com',
                'password' => Hash::make('12345678.'),
                'role' => 'cliente'
            ]);
            User::create([
                'name' => 'raul',
                'email' => 'ra_a@gmail.com',
                'password' => Hash::make('12345678.'),
                'role' => 'administrador'
            ]);
            User::create([
                'name' => 'ronald',
                'email' => 'ronaldc@gmail.com',
                'password' => Hash::make('12345678.'),
                'role' => 'cliente'
            ]);
            
    }
}
