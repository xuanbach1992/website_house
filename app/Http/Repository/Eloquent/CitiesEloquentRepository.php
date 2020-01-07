<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01/07/2020
 * Time: 16:21 PM
 */

namespace App\Http\Repository\Eloquent;


use App\Cities;
use App\Http\Repository\CitiesRepositoryInterface;

class CitiesEloquentRepository implements CitiesRepositoryInterface
{
    protected $cities;

    public function __construct(Cities $cities)
    {
        $this->cities = $cities;
    }

    public function getAllCities()
    {
        return $this->cities->all();
    }
}
