<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use Faker\Factory as Faker;

class PageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$items = [
            ['politique-de-confidentialite', 'Politique de confidentialité'],
            ['respect-environnement', 'Respect de l\'environnement'],
        ];
        
        foreach($items as $item) {
            \App\Models\Page::factory()->create([
                'slug' => $item[0],
                'title' => $item[1],
            ]);
        }
    }
}
