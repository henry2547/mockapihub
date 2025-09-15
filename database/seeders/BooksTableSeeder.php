<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $books = [];

        for ($i = 0; $i < 50; $i++) {
            $books[] = [
                'title' => $faker->sentence(4),
                'author' => $faker->name,
                'isbn' => $faker->isbn13,
                'published_date' => $faker->dateTimeBetween('-20 years', 'now')->format('Y-m-d'),
                'description' => $faker->paragraph(3),
                'genre' => $faker->randomElement(['Fiction', 'Non-Fiction', 'Science Fiction', 'Mystery', 'Romance', 'Biography', 'History', 'Science', 'Technology', 'Fantasy']),
                'publisher' => $faker->company,
                'language' => 'English',
                'page_count' => $faker->numberBetween(100, 800),
                'cover_image' => $faker->imageUrl(200, 300, 'books', true),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('books')->insert($books);
    }
}
