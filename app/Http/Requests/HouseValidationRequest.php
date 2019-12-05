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
            'house_type' => 'required',
            'room_type' => 'required',
            'bedrooms' => 'required',
            'bathroom' => 'required',
            'price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'address.required' => 'Địa chỉ không được bỏ trống',
            'house_type.required' => 'Kiểu nhà không được bỏ trống',
            'room_type.required' => 'Kiểu phòng không được bỏ trống',
            'bedrooms.required' => 'Số phòng ngủ không được bỏ trống',
            'bathroom.required' => 'Số phòng tắm không được bỏ trống',
            'price.required' => 'Giá tiền không được bỏ trống',
        ];
    }
}
