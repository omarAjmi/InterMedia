<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Message;

class MessagesTableSeeder extends Seeder
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
            Message::create([
                'discussion_id' => $faker->numberBetween(1, 29),
                'sender_id' => $faker->numberBetween(1, 29),
                'context' => $faker->paragraph,
                'seen' => $faker->randomElement([true, false])
            ]);
        }
    }
}
