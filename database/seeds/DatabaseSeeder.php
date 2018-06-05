<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(TechniciansTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(DevicesTableSeeder::class);
        $this->call(BreakdownsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(DiscussionsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(PromotionsTableSeeder::class);
    }
}