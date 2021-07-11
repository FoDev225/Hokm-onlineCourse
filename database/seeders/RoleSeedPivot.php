<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Faker\Factory as Faker;

class RoleSeedPivot extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            1 => [
                'permissions' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35],
            ],
            2 => [
                'permissions' => [1, 21, 22, 23, 24, 26, 27, 28, 29, 31, 32, 33, 34],
            ],
            3 => [
                'permissions' => [1, 21, 24, 26, 29],
            ],

        ];

        foreach ($items as $id => $item) {
            $role = Role::find($id);

            foreach ($item as $key => $ids) {
                $role->{$key}()->sync($ids);
            }
        }
    }
}
