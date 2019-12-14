<?php

use Illuminate\Database\Seeder;
use App\Cities;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new Cities();
        $city->name = 'TP Hà Nội';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Đà Nẵng';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Hải Phòng';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Cần Thơ';
        $city->save();

        $city = new Cities();
        $city->name = 'TP HCM';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Ninh bình';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Hội an';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Huế';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Nha trang';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Đà lạt';
        $city->save();

        $city = new Cities();
        $city->name = 'TP Hạ long';
        $city->save();
    }
}
