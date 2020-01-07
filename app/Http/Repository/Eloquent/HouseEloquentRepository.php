<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01/07/2020
 * Time: 15:44 PM
 */

namespace App\Http\Repository\Eloquent;


use App\House;
use App\Http\Repository\HouseRepositoryInterface;

class HouseEloquentRepository implements HouseRepositoryInterface
{
    public function getAll()
    {
        return House::all();
    }

}
