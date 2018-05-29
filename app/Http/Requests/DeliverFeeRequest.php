<?php

namespace App\Http\Requests;

class DeliverFeeRequest extends Request
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
       return array();
    }

    public function messages()
    {
        return [
            'distance.unique'   => 'Khoảng cách phải nhập là số nguyên',
            'Price.max'       => 'Phí giao hàng chứa tối đa 4 chữ số và phải là số nguyên',
        ];
    }
}
