<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 01/07/2020
 * Time: 15:45 PM
 */

namespace App\Http\Services\Imple;


use App\Http\Repository\HouseRepositoryInterface;
use App\Http\Services\HouseServicesInterface;

class HouseServices implements HouseServicesInterface
{
    protected $houseRepositoryInterface;

    public function __construct(HouseRepositoryInterface $houseRepositoryInterface)
    {
        $this->houseRepositoryInterface = $houseRepositoryInterface;
    }

    public function getAll()
    {
        return $this->houseRepositoryInterface->getAll();
    }
}
