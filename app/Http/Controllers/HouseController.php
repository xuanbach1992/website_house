<?php

namespace App\Http\Controllers;

use App\Cities;
use App\District;
use App\House;
use App\HouseCategory;
use App\Http\Requests\HouseValidationRequest;
use App\RoomCategory;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    protected $house;
    protected $houseCategory;
    protected $roomCategory;
    protected $city;
    protected $district;

    public function __construct(House $house,
                                HouseCategory $houseCategory,
                                RoomCategory $roomCategory,
                                Cities $city,
                                District $district)
    {
        $this->house = $house;
        $this->houseCategory = $houseCategory;
        $this->roomCategory = $roomCategory;
        $this->city = $city;
        $this->district = $district;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * auth : hiep
     */
    public function listHouses()
    {
        $houses = $this->house->all();
        $listCities = $this->city->all();

        return view('page.product', [
            'houses' => $houses,
            'listCities' => $listCities
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * auth : hiep
     */
    public function create()
    {
        $listHouseCategory = $this->houseCategory->all();
        $listRoomCategory = $this->roomCategory->all();
        $listCities = $this->city->all();
        $listDistrict = $this->district->all();

        return view('house.add', compact('listHouseCategory', 'listRoomCategory', 'listCities', 'listDistrict'));
    }

    /**
     * @param HouseValidationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(HouseValidationRequest $request)
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

        $house->district_id = $request->district_id;
        $house->description = $request->description;
        $house->price = $request->price;

        if (!$request->hasFile('image')) {
            $house->image = $request->image;
        } else {
            $image = $request->file('image');
            $path = $image->store('image', 'public');
            $house->image = $path;
        }

        $house->save();
        toastr()->success('Create success', 'message');
        return redirect()->route('index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHouseDetails($id)
    {
        $house = House::findOrFail($id);
        $listHouseCategory = HouseCategory::all();
        $listRoomCategory = RoomCategory::all();
        $listCities = Cities::all();
        $listDistrict = District::all();
        return view('page.house-details', compact('house', 'listCities', 'listRoomCategory', 'listHouseCategory', 'listDistrict'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $filter = $request->all();

        $query = $this->house;

        if ($request->has('keyBedrooms') && !empty($request->get('keyBedrooms'))) {
            $query = $query->where('bedrooms', $request->get('keyBedrooms'));
        }
        if ($request->has('keyBathroom') && !empty($request->get('keyBathroom'))) {
            $query = $query->where('bathroom', $request->get('keyBathroom'));
        }
        if ($request->has('price_from') && !empty($request->get('price_from'))){
            $query = $query->where('price','>=',$request->get('price_from'));
        }
        if ($request->has('price_to') && !empty($request->get('price_to'))){
            $query = $query->where('price','<=',$request->get('price_to'));
        }
        if ($request->has('cities') && $request->get('cities') != '-1'){
            $query = $query->where('id', $request->get('cities'));
        }
        if ($request->has('district') && $request->get('district') != '-1'){
            $query = $query->where('id', $request->get('district'));
        }

//        dd($query->toSql());

        $houses = $query->get();
        $listCities = $this->city->all();

        return view('page.product', compact(
            'houses',
            'listCities'
        ));
    }
}
