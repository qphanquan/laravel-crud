<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->delete();
        $faker = Faker::create();
        $author_ids = Author::all()->pluck('id')->toArray();
        for($i = 0; $i < 100; $i++){
            Book::create([
                'author_id' => $faker->randomElement($author_ids),
                'title' => $faker->sentence(5),
            ]);
        }
    }
}
