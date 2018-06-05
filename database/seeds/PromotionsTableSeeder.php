<?php

use App\Promotion;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 8; $i++) {
            App\Promotion::create([
                'title' => $faker->sentence,
                'image' => ($i+1).'.jpg',
                'category' => $faker->randomElement([
                    'smartphone',
                    'laptop',
                    'accessorie'
                ])
            ]);
        }
    }
}
