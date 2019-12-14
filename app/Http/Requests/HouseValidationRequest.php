<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
<<<<<<< HEAD
            'bedrooms' => 'required|integer',
            'bathroom' => 'required|integer',
            'price' => 'required|integer',
            'cities_id' => 'required',
            'district_id' => 'required',
=======
            'bedrooms' => 'required|alpha_num|between:1,2',
            'bathroom' => 'required|alpha_num|between:1,2',
            'price' => 'required|alpha_num|between:5,10'
>>>>>>> dev
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'bedrooms.required' => 'Số phòng ngủ không được bỏ trống',
            'bedrooms.integer' => 'Phải nhập dữ liệu số',
            'bathroom.required' => 'Số phòng tắm không được bỏ trống',
            'bathroom.integer' => 'Phải nhập dữ liệu số',
            'price.required' => 'Giá tiền không được bỏ trống',
            'price.integer' => 'Phải nhập dữ liệu số',
            'cities_id.required' => 'Vui long chon thanh pho',
            'district_id.required' => 'Vui long chon quan huyen',
        ];
    }
}
