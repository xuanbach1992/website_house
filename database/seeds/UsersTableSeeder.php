<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->id = 1;
        $user->name = "admin";
        $user->email = "admin@gmail.com";
        $user->phone = "0963729166";
        $user->address = '15 tt 04 moncity my dinh 2 nam tu liem ha noi';
        $user->password = \Illuminate\Support\Facades\Hash::make('123456');
        $user->save();

        $user = new \App\User();
        $user->id = 2;
        $user->name = "bach";
        $user->email = "bach@gmail.com";
        $user->phone = "01687256692";
        $user->address = 'demo address';
        $user->password = \Illuminate\Support\Facades\Hash::make('123456');
        $user->save();

    }
}
