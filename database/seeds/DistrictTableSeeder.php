<?php

use Illuminate\Database\Seeder;
use App\District;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $district = new District();
        $district->name = 'abc';
        $district->cities_id = 1;
        $district->save();

        $district = new District();
        $district->name = 'dfgs';
        $district->cities_id = 1;
        $district->save();

        $district = new District();
        $district->name = 'sdgsgs';
        $district->cities_id = 2;
        $district->save();

        $district = new District();
        $district->name = 'asgsdbc';
        $district->cities_id = 3;
        $district->save();
    }
}
