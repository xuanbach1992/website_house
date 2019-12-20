<?php

use Illuminate\Database\Seeder;
use App\House;

class HouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $house = new House();
        $house->name = 'nhà của bạn';
        $house->address = 'số 1 - thăng long';
        $house->phone = '165541651';
        $house->house_category_id = 2;
        $house->room_category_id = 2;
        $house->cities_id = 2;
        $house->district_id = 1;
        $house->bedrooms = 5;
        $house->bathroom = 3;
        $house->price = 922000;
        $house->save();
    }
}
