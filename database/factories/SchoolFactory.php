<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = School::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         return [
            'name' => $this->faker->sentence(2),
            'email' => $this->faker->email,
            'tel' => $this->faker->phoneNumber,
            'facebook' => $this->faker->url,
            'home' => $this->faker->sentence(3),
            'home_infos' => $this->faker->text,
        ];
    }
}
