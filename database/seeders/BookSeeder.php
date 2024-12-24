<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 10 books
        foreach (range(1, 10) as $index) {
            Book::create([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'published_year' => $faker->year,
                'is_borrowed' => $faker->boolean,
            ]);
        }
    }
}
