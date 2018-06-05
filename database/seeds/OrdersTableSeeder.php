<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
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
            App\Order::create([
                'nature' =>  $faker->randomElement(['Facturable', 'Non Facturable']),
                'return_date' => $faker->date ,
                'verified' => $faker->randomElement([true, false]),
                'client_id' => $faker->numberBetween($min=6, $max=29),
            ]);
        }
    }
}
