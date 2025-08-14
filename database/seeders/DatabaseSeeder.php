<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Widget;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Widget::factory(1)->create(['title' => 'Widget One']);
        Widget::factory(1)->create(['title' => 'Widget Two']);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'bio' => 'This is a test user for the application.',
            'tags' => ['AU', 'UK', 'CA'],
            'hobbies' => ['guitar', 'gaming', 'coding'],
        ]);
    }
}
