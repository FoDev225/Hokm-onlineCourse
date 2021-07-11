<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\School;
use Faker\Factory as Faker;

class SchoolSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::factory(1)->create();
    }
}
