<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 30; $i++) {
            App\Payment::create([
                'order_id' => $i,
                'cost' => $faker->randomFloat($nbMaxDecimals = 6, $min = 5, $max = 100),
                'deposit' => $faker->randomFloat($nbMaxDecimals = 6, $min = 5, $max = 100),
                'payed' => $faker->randomElement([true, false]),
            ]);
        }
    }
}
