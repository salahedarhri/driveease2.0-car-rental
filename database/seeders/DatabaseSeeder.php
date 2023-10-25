<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            $this->call(CarSeeder::class);
        }

        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'salah',
            'email' => 'salah@mail.com',
        ]);
    }
}
