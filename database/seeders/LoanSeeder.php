<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Member;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $books = Book::all();
        $members = Member::all();

        // Create 10 loans
        foreach (range(1, 10) as $index) {
            $book = $books->random();
            $member = $members->random();

            Loan::create([
                'book_id' => $book->id,
                'member_id' => $member->id,
                'is_returned' => $faker->boolean,
                'due_date' => Carbon::now()->addDays(rand(7, 30)),
            ]);
        }
    }
}
