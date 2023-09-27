<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some authors and books using factories
        $authors = Author::factory()->count(10)->create();
        $books = Book::factory()->count(20)->create();
 
        // Attach books to authors
        $authors->each(function ($author) use ($books) {
            $author->books()->attach(
                $books->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
