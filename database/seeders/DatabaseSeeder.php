<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CarSeeder::class);
        $this->call(ProtectionSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(LieuSeeder::class);
    }
}
