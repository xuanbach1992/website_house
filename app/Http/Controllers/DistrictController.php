<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    protected $district;

    public function __construct(District $district)
    {
        $this->district = $district;
    }

    public function getDataByCitiesId(Request $request)
    {
        $id = $request->get('id');
        $data = $this->district->where('cities_id', $id)->get();

        if ($data->isEmpty()) {
            return response()->json([
                'erros' => true,
                'message' => 'Không tìm thấy dữ liệu tương ứng',
                'data' => []
            ]);
        }

        return response()->json([
            'erros' => false,
            'message' => 'success',
            'data' => $data
        ]);
    }
}
