<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{ Category, Course, Lesson, User };
use Faker\Factory as Faker;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::factory(6)
            ->create()
            ->each(function ($category) 
            {
                $category->courses()->saveMany(Course::factory(5)
                    ->make())
                    ->each(function ($course) 
                    {
                        $course->lessons()->saveMany(Lesson::factory(10)
                            ->create());
                    });
            });
    }
}