<?php

namespace App\Http\Controllers;

use App\Cities;
use App\House;
use App\HouseCategory;
use App\Http\Requests\HouseValidationRequest;
use App\Image;
use App\RoomCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    public function __construct()
    {
        //
    }

    public
    function listHouses()
    {
        $houses = House::all();
        return view('page.product', compact('houses'));
    }

    public
    function create()
    {
        $listHouseCategory = HouseCategory::all();
        $listRoomCategory = RoomCategory::all();
        $listCities = Cities::all();
        return view('house.add', compact('listHouseCategory', 'listRoomCategory', 'listCities'));
    }

    public
    function add(HouseValidationRequest $request)
    {
        $house = new House();
        $house->name = $request->name;
        $house->address = $request->address;

        $house->phone = $request->phone;
        $house->house_category_id = $request->house_category_id;
        $house->room_category_id = $request->room_category_id;

        $house->cities_id = $request->cities_id;
        $house->bedrooms = $request->bedrooms;
        $house->bathroom = $request->bathroom;

        $house->description = $request->description;
        $house->price = $request->price;

//        if (!$request->hasFile('image')) {
//            $house->image = $request->image;
//        } else {
//            $image = $request->file('image');
//            $path = $image->store('image', 'public');
//            $house->image = $path;
//        }

        $house->save();
        toastr()->success('Create success', 'message');
        return view('house.upload');
    }

    public
    function storeImage(Request $request)
    {
//        if ($request->ajax()) {/
            $house_id = DB::table('houses')->max('id');
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $path = $image->store('rooms', 'public');
                $imageUpload = new Image();
                $imageUpload->path = $path;
                $imageUpload->house_id = $house_id;
                $imageUpload->save();
                return redirect()->route('index');
            }
//        }
    }

    public function showHouseDetails($id)
    {
        $house = House::findOrFail($id);
        $listHouseCategory = HouseCategory::all();
        $listRoomCategory = RoomCategory::all();
        $listCities = Cities::all();
        return view('page.house-details', compact('house', 'listCities', 'listRoomCategory', 'listHouseCategory'));
    }


}
