<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $user = User::firstOrCreate(
            ['email' => 'isniabrianti@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('123456dummy'), 
                'role' => 'admin'
            ]
        );
        if ($user->wasRecentlyCreated || $user->role !== 'admin') {
            $user->role = 'admin';
            $user->save();
        }
    }
}
