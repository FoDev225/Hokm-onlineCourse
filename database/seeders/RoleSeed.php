<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Faker\Factory as Faker;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Administrator (can create other users)',],
            ['id' => 2, 'name' => 'Teacher',],
            ['id' => 3, 'name' => 'Student',],

        ];

        foreach ($items as $item) {
            Role::create($item);
        }  
    }
}