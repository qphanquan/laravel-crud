<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;
use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->delete();

        $faker = Faker::create();

        for($i = 0; $i < 50; $i++){
            Author::create([
                'name' => $faker->name,
                'bio' => $faker->paragraph(4),
                'avatar' => $faker->image(),
                'gender' => $faker->randomElement([0 => 'male', 1 => 'female'])
            ]);
        }
    }
}
