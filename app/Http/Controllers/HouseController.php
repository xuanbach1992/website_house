<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\HouseValidationRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function create(){
        return view('house.add');
    }

    public function add(HouseValidationRequest $request){
        $house = new House();
        $house->name = $request->name;
        $house->address = $request->address;
        $house->house_type = $request->house_type;
        $house->room_type = $request->room_type;
        $house->bedrooms = $request->bedrooms;
        $house->bathroom = $request->bathroom;
        $house->description = $request->description;
        $house->price = $request->price;
        $house->save();

        return redirect()->route('index');

    }

}
