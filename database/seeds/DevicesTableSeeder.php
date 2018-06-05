<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 30; $i++) { 
            /* App\Device::create([
                'brand' => $faker->word,
                'model' => $faker->word,
                'color' => $faker->randomElement([
                    '#ededc0',
                    '#000000',
                    '#0000ff',
                    '#a52a2a',
                    '#ffd700',
                    '#008000',
                    '#daa520',
                    '#ffc0cb',
                    '#800080',
                    '#ff0000',
                    '#ffa500',
                    '#c0c0c0',
                    '#ffffff'
                ]),
                'accessories' => $faker->word,
            ]); */
            $d = App\Device::find($i+1);
            $d->update([
                'color' => $faker->randomElement([
                    '#ededc0',
                    '#000000',
                    '#0000ff',
                    '#a52a2a',
                    '#ffd700',
                    '#008000',
                    '#daa520',
                    '#ffc0cb',
                    '#800080',
                    '#ff0000',
                    '#ffa500',
                    '#c0c0c0',
                    '#ffffff'
                ])
            ]);
        }
    }
}
