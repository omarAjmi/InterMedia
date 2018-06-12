<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i <= 24; $i++) { 
            App\Client::create([
                'id' => $i+5
            ]);
        }
    }
}
