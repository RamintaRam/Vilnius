<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
//        $this->call(CountriesSeeder::class);
        $this->call(AirlinesSeeder::class);
//        $this->call(AirportsSeeder::class);
//        $this->call(FlightsSeeder::class);
    }
}
