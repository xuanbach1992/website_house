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
        $city = new User();
        $city->name = "admin";
        $city->email = "admin@gmail.com";
        $city->password = \Illuminate\Support\Facades\Hash::make('123456');
        $city->save();
    }
}
