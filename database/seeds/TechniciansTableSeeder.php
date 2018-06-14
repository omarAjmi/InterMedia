<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TechniciansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 5; $i++) { 
            App\Technician::create([
                'id' =>  $i,
                'cin' => $faker->ean8 ,
                'post' => $faker->randomElement([
                    'Technicien Hardware',
                    'Technicien Software',
                    'Technicien Informatique',
                    'Ingenieur Informatique'
                    ]),
                'bio' => $faker->text($maxNbChars = 200)
            ]);
        }
    }
}
