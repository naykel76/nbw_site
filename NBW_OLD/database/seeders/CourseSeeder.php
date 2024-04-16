<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{

    public function run(): void
    {
        \App\Models\Course::create([
            'title' => 'Introduction to Computer Science',
            'code' => 'CS101',
            'sort_order' => 8,
            'body' => 'This course will introduce you to the world of computer science. Topics include computational thinking, problem-solving, data representation, abstraction, procedures/algorithms, and more.',
            'status' => 'published',
            'price' => 1998.90,
            'published_at' => now(),
        ]);

        \App\Models\Course::create([
            'title' => 'Data Structures and Algorithms',
            'code' => 'CS102',
            'sort_order' => 3,
            'body' => 'This course will teach you about various data structures and algorithms used in computer science. Topics include arrays, linked lists, stacks, queues, trees, sorting, searching, and more.',
            'status' => 'draft',
            'price' => 0,
            'published_at' => null,
            'is_free' => true
        ]);

        \App\Models\Course::create([
            'title' => 'Web Development',
            'code' => 'CS103',
            'sort_order' => 89,
            'body' => 'This course will teach you how to build websites using HTML, CSS, and JavaScript. Topics include responsive design, front-end libraries, back-end servers, databases, and more.',
            'status' => 'pending_review',
            'price' => 187.50,
            'published_at' => now(),
        ]);

        \App\Models\Course::create([
            'title' => 'Database Systems',
            'code' => 'CS104',
            'body' => 'This course will teach you about the design and implementation of database systems. Topics include relational databases, SQL, database design, transaction processing, and more.',
            'status' => 'published',
            'price' => 2500.00,
            'published_at' => now(),
        ]);

        \App\Models\Course::create([
            'title' => 'Software Engineering',
            'code' => 'CS105',
            'body' => 'This course will introduce you to the principles and practices of software engineering. Topics include software development life cycle, agile methodologies, software testing, and more.',
            'status' => 'draft',
            'price' => 0,
            'published_at' => null,
            'is_free' => true
        ]);

        \App\Models\Course::create([
            'title' => 'Artificial Intelligence',
            'code' => 'CS106',
            'body' => 'This course will introduce you to the concepts and techniques used in artificial intelligence. Topics include machine learning, neural networks, natural language processing, and more.',
            'status' => 'pending_review',
            'price' => 3000.00,
            'published_at' => now(),
        ]);
        // \App\Models\Course::factory(18)->create();
    }
}
