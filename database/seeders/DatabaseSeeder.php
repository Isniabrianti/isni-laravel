<?php

namespace Database\Seeders;

// DatabaseSeeder.php
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        // Tambahkan seeder lainnya jika perlu
    }
}

