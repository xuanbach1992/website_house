<?php

namespace App\Http\Controllers;

use App\Cities;
use App\District;
use App\House;
use App\HouseCategory;
use App\Http\Requests\HouseValidationRequest;
use App\Image;
use App\Notifications\RepliedToThread;
use App\RoomCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


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

    public function findByUser()
    {
        $houses = House::where('user_id', Auth::user()->id)->get();
        $listCities = $this->city->all();
        $listHouseCategory = $this->houseCategory->all();

        return view('admin.pages.house-management', [
            'houses' => $houses,
            'listCities' => $listCities,
            'listHouseCategory' => $listHouseCategory
        ]);
    }

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

        return view('house.add', compact('listHouseCategory', 'listRoomCategory', 'listCities'));
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

        $house->district_id = $request->district_id;
        $house->bedrooms = $request->bedrooms;
        $house->bathroom = $request->bathroom;


        $house->description = $request->description;
        $house->price = $request->price;
        $house->user_id = Auth::user()->id;

//        if (!$request->hasFile('image')) {
//            $house->image = $request->image;
//        } else {
//            $image = $request->file('image');
//            $path = $image->store('image', 'public');
//            $house->image = $path;
//        }
//        $user=Auth::user();
        $house->save();
        toastr()->success('Create success', 'message');
        return view('house.upload');
    }

    public function storeImage(Request $request)
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
            toastr()->success('Upload success', 'message');
            return redirect()->route('index');
        }
    }

    public function showEdit($id)
    {
        $house = $this->house->findOrFail($id);
        if ($house->user_id === Auth::user()->id) {
            $listHouseCategory = $this->houseCategory->all();
            $listRoomCategory = $this->roomCategory->all();
            $listCities = $this->city->all();

            return view('admin.pages.edit', compact(
                    'house',
                    'listHouseCategory',
                    'listRoomCategory',
                    'listCities'
                )
            );
        } else {
            abort(403, "ban khong co quyen");
        }
    }

    //chưa sủ dụng được
    public function update(HouseValidationRequest $request, $id)
    {
        $house = $this->house->findOrFail($id);
        if ($house->user_id === Auth::user()->id) {
            $house->name = $request->name;
            $house->address = $request->address;
            $house->phone = $request->phone;

            $house->house_category_id = $request->house_category_id;
            $house->room_category_id = $request->room_category_id;
            $house->cities_id = $request->cities_id;

            $house->district_id = $request->district_id;
            $house->bedrooms = $request->bedrooms;
            $house->bathroom = $request->bathroom;

            $house->description = $request->description;
            $house->price = $request->price;


//        dd($request->status);
            $house->save();

            return redirect()->route('house.detail');
        } else {
            abort(403, "ban khong co quyen");
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @người viết: hiệp
     */
    public function delete($id)
    {
        $house = $this->house->findOrFail($id);
        if ($house->user_id === Auth::user()->id) {
            if (file_exists(storage_path("/app/public/$house->id"))) {
                File::delete(storage_path("/app/public/$house->id"));
            }

            $house->delete();

            return redirect()->route('admin.house');
        } else {
            abort(403, "ban khong co quyen");
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHouseDetails($id)
    {
        $house = House::findOrFail($id);

        $listHouseCategory = $this->houseCategory->all();
        $listRoomCategory = $this->roomCategory->all();
        $listCities = $this->city->all();
        $listDistrict = $this->district->all();

        return view('house.house-details', compact(
            'house',
            'listCities',
            'listRoomCategory',
            'listHouseCategory',
            'listDistrict'));
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
        if ($request->has('price_from') && !empty($request->get('price_from'))) {
            $query = $query->where('price', '>=', $request->get('price_from'));
        }
        if ($request->has('price_to') && !empty($request->get('price_to'))) {
            $query = $query->where('price', '<=', $request->get('price_to'));
        }
        if ($request->has('cities') && $request->get('cities') != '-1') {
            $query = $query->where('cities_id', $request->get('cities'));
        }
        if ($request->has('district') && $request->get('district') != '-1') {
            $query = $query->where('district_id', $request->get('district'));
        }

//        dd($query->toSql());
        $houses = $query->get();
        $listCities = $this->city->get();

        return view('page.product', compact(
            'filter',
            'houses',
            'listCities'
        ));
    }

    public function updateStatus(Request $request, $id)
    {
        $house = $this->house->findOrFail($id);

        if (isset($request->status)) {
            $house->status = true;
        } else {
            $house->status = false;
        }
        $house->save();

        return redirect()->route('admin.house', $id);
    }


    public function book($house_id)
    {
        $user_id = House::find($house_id)->user_id;
        $house_title = House::find($house_id)->name;
        $email = User::find($user_id)->email;
        \auth()->user()->notify(new RepliedToThread($email, $house_title));
        return redirect('/');
    }

    public function showMaster()
    {
        return view('admin.layout.master');
    }

    public function showNotify()
    {
        return view('admin.pages.notify');
    }
}
