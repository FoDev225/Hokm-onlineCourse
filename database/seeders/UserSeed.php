<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(5)->create();

        $user = User::find(1);
        $user->name = 'Nanourgo Pierre';
        $user->phone = '0141496151';
        $user->email = 'nanourgo@admin.com';
        $user->password = '$2y$10$gwdIcU..FYfdPj7a5tCD4O4chVPmC5TIqJ7UoyWWs57SVZ4IpwYFq';
        $user->photo = null;
        $user->newsletter = 1;
        $user->save();
    }
}
