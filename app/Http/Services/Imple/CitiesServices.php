<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01/07/2020
 * Time: 16:20 PM
 */

namespace App\Http\Services\Imple;


use App\Http\Repository\CitiesRepositoryInterface;
use App\Http\Services\CitiesServicesInterface;

class CitiesServices implements CitiesServicesInterface
{
    protected $citiesRepositoryInterface;

    public function __construct(CitiesRepositoryInterface $citiesEloquentRepository)
    {
        $this->citiesRepositoryInterface = $citiesEloquentRepository;
    }

    public function getAll()
    {
        return $this->citiesRepositoryInterface->getAllCities();
    }
}
