<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Billy McDoogle',
            'email' => 'billy@example.com.',
            'password' => bcrypt('1'),
            'email_verified_at' => now(),
        ]);
    }
}
