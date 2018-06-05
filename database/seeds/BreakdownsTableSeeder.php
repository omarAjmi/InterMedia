<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BreakdownsTableSeeder extends Seeder
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
            App\Breakdown::create([
                'order_id' => $i,
                'device_id' => $i,
                'title' => $faker->sentence,
            ]);
        }
    }
}
