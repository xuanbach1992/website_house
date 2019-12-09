<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\HouseValidationRequest;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function listHouses(){
        $houses = House::all();
        return view('page.product',compact('houses'));
    }

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

        if (!$request->hasFile('image')){
            $house->image = $request->image;
        }else{
            $image = $request->file('image');
            $path = $image->store('image','public');
            $house->image = $path;
        }

        $house->save();

        return redirect()->route('index');

    }

}
