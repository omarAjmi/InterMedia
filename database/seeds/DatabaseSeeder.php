<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        App\User::create([
            'first_name' => 'Marwa',
            'last_name' => 'Khemir',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'confirm_hash' => Hash::make('12345678'.'email'),
            'address' => 'faculte des science Monastir 5000',
            'image' => $faker->randomElement(['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', 'default.png']),
            'phone' => "12345678"
        ]);
        App\Technician::create([
            'id' => 1,
            'admin' => 1,
            'cin' => '12345678',
            'post' => 'Technicien Informatique',
            'bio' => $faker->text($maxNbChars = 50)
        ]);
        /* $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(TechniciansTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(BreakdownsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(DiscussionsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(PromotionsTableSeeder::class); */
    }
}