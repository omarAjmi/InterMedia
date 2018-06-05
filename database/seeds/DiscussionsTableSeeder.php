<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 30; $i++) { 
            Discussion::create([
                'order_id' => $i
            ]);
        }
    }
}
