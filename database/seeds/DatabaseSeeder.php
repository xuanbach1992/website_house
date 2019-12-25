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
        $this->call(RoomCategoryTableSeeder::class);
        $this->call(HouseCategoryTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(StarsTableSeeder::class);
    }
}
