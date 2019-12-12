<?php

use Illuminate\Database\Seeder;
use App\RoomCategory;

class RoomCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomType = new RoomCategory();
        $roomType->name = 'Phòng đơn';
        $roomType->save();

        $roomType = new RoomCategory();
        $roomType->name = 'Phòng đôi';
        $roomType->save();

        $roomType = new RoomCategory();
        $roomType->name = 'Phòng ba';
        $roomType->save();

        $roomType = new RoomCategory();
        $roomType->name = 'Phòng bốn';
        $roomType->save();

        $roomType = new RoomCategory();
        $roomType->name = 'Phòng năm';
        $roomType->save();
    }
}
