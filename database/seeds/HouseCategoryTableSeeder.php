<?php

use Illuminate\Database\Seeder;
use App\HouseCategory;

class HouseCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houseType = new HouseCategory();
        $houseType->name = 'Căn hộ chung cư';
        $houseType->save();

        $houseType = new HouseCategory();
        $houseType->name = 'Biệt thự';
        $houseType->save();

        $houseType = new HouseCategory();
        $houseType->name = 'Căn hộ studio';
        $houseType->save();

        $houseType = new HouseCategory();
        $houseType->name = 'Nhà riêng';
        $houseType->save();

        $houseType = new HouseCategory();
        $houseType->name = 'Căn hộ dịch vụ';
        $houseType->save();

        $houseType = new HouseCategory();
        $houseType->name = 'Hotel - Khách sạn';
        $houseType->save();

        $houseType = new HouseCategory();
        $houseType->name = 'Homestay';
        $houseType->save();

    }
}
