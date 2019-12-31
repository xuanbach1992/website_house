<?php

namespace App\Http\Controllers;

use App\Cities;
use App\Comment;
use App\District;
use App\House;
use App\HouseCategory;
use App\Http\Requests\DateCheckinValidate;
use App\Http\Requests\HouseValidationRequest;
use App\Image;
use App\Notifications\SendNotificationToHouseHost;
use App\Order;
use App\RoomCategory;
use App\Star;
use App\StatusInterface;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class HouseController extends Controller
{
    protected $house;
    protected $houseCategory;
    protected $roomCategory;
    protected $city;
    protected $district;
    protected $star;
    protected $comment;

    public function __construct(House $house,
                                HouseCategory $houseCategory,
                                RoomCategory $roomCategory,
                                Cities $city,
                                District $district,
                                Star $star,
                                Comment $comment)
    {
        $this->house = $house;
        $this->houseCategory = $houseCategory;
        $this->roomCategory = $roomCategory;
        $this->city = $city;
        $this->district = $district;
        $this->star = $star;
        $this->comment = $comment;
    }

    //code vẽ biểu đồ
    public function findByUser()
    {
        $user_id = Auth::user()->id;
        $houses = House::where('user_id', $user_id)->get();
        $listHouseCategory = $this->houseCategory->all();
        $rangeDay = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
        $rangeMonth = \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2);
        $orderDay = Order::select(
            DB::raw('day(check_in) as getDays'),
            DB::raw('SUM(pay_money) as moneyInDays')
        )
            ->Join('houses', 'house_id', '=', 'houses.id')
            ->where('houses.user_id', '=', $user_id)
            ->where('check_out', '<=', $rangeDay)
            ->groupBy('getDays')
            ->orderBy('getDays')
            ->get();
        $orderMonth = Order::select(
            DB::raw('month(check_in) as getMonth'),
            DB::raw('SUM(pay_money) as moneyInMonth')
        )
            ->Join('houses', 'house_id', '=', 'houses.id')
            ->where('houses.user_id', '=', $user_id)
            ->where('check_out', '>=', $rangeMonth)
            ->groupBy('getMonth')
            ->orderBy('getMonth')
            ->get();
        return view('admin.pages.house-management', [
            'houses' => $houses,
            'listHouseCategory' => $listHouseCategory,
            'orderDay' => $orderDay,
            'orderMonth' => $orderMonth,
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
        $house->house_category_id = $request->house_category_id;
        $house->room_category_id = $request->room_category_id;
        $house->cities_id = $request->cities_id;
        $house->district_id = $request->district_id;
        $house->bedrooms = $request->bedrooms;
        $house->bathroom = $request->bathroom;
        $house->status = StatusInterface::SANSANG;
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
        $house_id = DB::table('houses')->max('id');
        $star = new Star();
        $star->house_id = $house_id;
        $star->user_id = Auth::user()->id;
        $star->number = 5;
        $star->content = 'nhà đẹp, dịch vụ tốt';
        $star->save();
        toastr()->success('Create new house success', 'message');
        toastr()->warning('Upload image into house rent');
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
            toastr()->success('Upload image house success');
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
            toastr()->success('update success', 'message');
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
            toastr()->success('delete success', 'message');
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
        $user = Auth::user();
        $house = House::findOrFail($id);
        $orders = Order::where('house_id', $house->id)->get();
        $listHouseCategory = $this->houseCategory->all();
        $listRoomCategory = $this->roomCategory->all();
        $listCities = $this->city->all();
        $listDistrict = $this->district->all();
        $starMedium = 0;
        $house_id = $house->id;
        $stars = Star::where('house_id', $house_id)->get();
        $listStar = $this->star->where('house_id', $house_id)->orderBy('id', 'desc')->paginate(5);
        if ($stars !== null) {
            $countStar = 0;
            $allStarInHouseDetail = 0;
            foreach ($stars as $star) {
                $allStarInHouseDetail += $star->number;
                $countStar++;
            }
            $starMedium = $allStarInHouseDetail / $countStar;
        }

        $listComment = $this->comment->where('house_id', $house_id)->orderBy('id', 'asc')->get();


        return view('house.details', compact(
            'house',
            'listCities',
            'orders',
            'listRoomCategory',
            'listHouseCategory',
            'listDistrict', 'listStar', 'starMedium', 'listComment', 'user','allStarInHouseDetail'));
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
        $housesList = $query->get();
        $housesOrder = Order::all();
        $houses = [];
        $inputCheckIn = $request->get('check_in');
        $inputCheckOut = $request->get('check_out');
        for ($j = 0; $j < count($housesList); $j++) {
            array_push($houses, $housesList[$j]);
        }
        for ($i = 0; $i < count($housesOrder); $i++) {
            for ($j = 0; $j < count($houses); $j++) {
                if (!empty($inputCheckIn) && !empty($inputCheckOut)) {
                    if ((Carbon::parse($inputCheckIn)->timestamp >= Carbon::parse($housesOrder[$i]->check_in)->timestamp
                            || Carbon::parse($inputCheckOut)->timestamp >= Carbon::parse($housesOrder[$i]->check_out)->timestamp)
                        && $housesOrder[$i]['house_id'] == $houses[$j]['id']) {
                        array_splice($houses, $j, 1);
                    }
                }
            }
        }
//        dd($query->toSql());
        $listCities = $this->city->get();
        return view('page.product', compact(
            'filter',
            'houses',
            'listCities'
        ));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function updateStatus(Request $request, $id)
    {
        $house = $this->house->findOrFail($id);
        switch ($request->status) {
            case 1 :
                $house->status = StatusInterface::SANSANG;
                break;
            case 3 :
                $house->status = StatusInterface::CHUANHANPHONG;
                break;
            case 4 :
                $house->status = StatusInterface::NHANPHONG;
                break;
            case 5 :
                $house->status = StatusInterface::TRAPHONG;
                break;
        }
        $house->save();
        return redirect()->route('admin.house', $id);
    }

    public function showNotify()
    {
        return view('admin.pages.notify');
    }

    public function book($house_id, DateCheckinValidate $request)
    {
        $house = House::find($house_id);
        $user_id = $house->user_id;
        $house_title = $house->name;
        $email_host = User::find($user_id)->email;//email chu nha
        $orders = Order::where('house_id', $house_id)->get();
        $checkInTimestampRequest = Carbon::parse($request->get('checkin'))->timestamp;
        $checkOutTimestampRequest = Carbon::parse($request->get('checkout'))->timestamp;
        foreach ($orders as $order) {
            if (!empty($request->get('checkin')) && !empty($request->get('checkout'))) {
                if (
                    ($checkInTimestampRequest >= Carbon::parse($order->check_in)->timestamp
                        && $checkInTimestampRequest <= Carbon::parse($order->check_out)->timestamp) &&
                    ($checkOutTimestampRequest >= Carbon::parse($order->check_in)->timestamp
                        && $checkOutTimestampRequest <= Carbon::parse($order->check_out)->timestamp) ||
                    ($checkInTimestampRequest <= Carbon::parse($order->check_in)->timestamp
                        && $checkOutTimestampRequest >= Carbon::parse($order->check_out)->timestamp)
                ) {
                    toastr()->warning('Đã có người thuê trong thời gian này');
                    return back();
                }
            }
        }
        $checkin = Carbon::create($request->checkin);
        $checkout = Carbon::create($request->checkout);
        $totalPrice = ($checkin->diffInDays($checkout)) * House::find($house_id)->price;
        toastr()->warning('đặt phòng, đang chờ chủ nhà xác nhận', 'message');
        \auth()->user()->notify(new SendNotificationToHouseHost($house_id, $email_host, $house_title, $request->checkin, $request->checkout, $totalPrice));
//        Mail::send('house.content', array('content' => 'Yêu cầu xác nhận thuê nhà từ khách hàng'),
//            function ($message) {
//                $message->to('hiepken95@gmail.com', 'Visitor')->subject('Xác nhận thuê nhà!');
//            });
        return redirect('/');
    }

    public function showRented()
    {
        $user_id = Auth::user()->id;
        $orders = Order::where('user_id', '=', $user_id)
            ->orderBy('check_out', 'DESC')
            ->get();
            return view('admin.pages.rented', compact('orders'));
    }

    public function userCheckinHouse($order_id)
    {
        $order = Order::findOrFail($order_id);
        $house = House::findOrFail($order->house_id);
        $order->status = StatusInterface::NHANPHONG;
        $order->save();

//        dd($order->status, $house->status);
        $house->status = StatusInterface::NHANPHONG;
        $house->save();


        toastr()->success('xin chao quy khach da den thue nha');
        return back();
    }

    public function userCheckoutHouse($order_id)
    {
        $order = Order::findOrFail($order_id);
        $house = House::findOrFail($order->house_id);
        $house->status = StatusInterface::SANSANG;
        $house->save();
        $order->status = StatusInterface::DAHOANTHANH;
        $order->save();
        toastr()->success('Xin chao va hen gap lai');
        return back();
    }
}
