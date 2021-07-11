<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;

        return [
            'user_id' => User::all()->random()->id,
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(500),
            'price' => $this->faker->numberBetween(0, 10000),
            'image' => $this->faker->image('public/images/courses',640,480, null, false),
            'published' =>rand(0, 1),
        ];
    }
}
