<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->text(50);
    
        return [
            'title' => $name,
            'slug' => Str::slug($name),
            'full_text' => $this->faker->text(1000),
            'full_text' => $this->faker->mimeType('storage/lessons/videos/','avi, mp4, 3gp'),
            'position' => rand(1, 10),
        ];
    }
}
