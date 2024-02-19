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

        $tasks = [
            'Buy groceries',
            'Finish report',
            'Call the bank',
            'Clean the house',
            'Prepare for the meeting',
            'Pay utility bills',
        ];

        $tasks = [
            'First Item',
            'Second Item',
            'Third Item',
            'Fourth Item',
            'Fifth Item',
            'Sixth Item',
        ];

        foreach ($tasks as $index => $task) {
            \App\Models\Thing::create([
                'name' => $task,
                'sort_order' => $index + 1,
            ]);
        }
    }
}
