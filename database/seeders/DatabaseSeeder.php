<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ 
            UserSeed::class,
            CategorySeed::class,
            PageSeed::class,
            SchoolSeed::class,
            RoleSeed::class,
            PermissionSeed::class,
            RoleSeedPivot::class,
            CommentSeed::class,
        ]);
    }
}
