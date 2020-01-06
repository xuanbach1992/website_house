<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateCheckinValidate extends FormRequest
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
            'checkin' => 'required|after:today',
            'checkout' => 'required|after:today'
        ];
    }
    public function messages()
    {
        return [
            'checkin.required' => 'Ngày thuê không được bỏ trống',
            'checkout.required' => 'Ngày trả phòng không được bỏ trống',
            'checkin.after'=>'Ngày thuê phải sau ngày hôm nay',
            'checkout.after'=>'Ngày trả phải sau ngày hôm nay',
        ];
    }
}
