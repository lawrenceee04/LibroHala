<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\BorrowingTransaction;
use App\Models\Journal;
use App\Models\Patron;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Lawrence Garcia',
        //     'email' => 'lawrencelg04@gmail.com',
        //     'password' => '$2y$10$Krdg5VilynNhWrEvf9YwOeyhNKWVvBVmdmgRmVJ5abBVcSZt/C4ly'
        // ]);

        // Patron::factory(100)->create();

        Book::factory(100)->create();

        Journal::factory(40)->create();

        Visit::factory(200)->create();

        BorrowingTransaction::factory(100)->create();
    }
}
