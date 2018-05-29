<?php

namespace App\Http\Requests;

class PaymentRequest extends Request
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
            'name'          => 'required|max:50',
            'address'       => 'required',
            'phone'         => 'required|numeric|digits_between:1,20',
            'postcode'      => 'digits:6',
            'province'      => 'required',
            'district'      => 'required',
            'ward'          => 'required',
            'radioCheckout' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Bạn chưa nhập Họ Tên',
            'name.max'                  => 'Tên chứa tối đa 50 ký tự',

            'address.required'          => 'Bạn chưa nhập Địa chỉ',

            'phone.required'            => 'Bạn chưa nhập Số điện thoại',
            'phone.numeric'             => 'Bạn đã nhập ký tự không phù hợp',
            'phone.digits_between'      => 'Điện thoại chứa tối đa 20 ký tự',

            'postcode.digits'           => 'Mã bưu điện gồm 6 số',

            'province.required'         => 'Bạn chưa chọn Tỉnh - Thành Phố',

            'district.required'         => 'Bạn chưa chọn Quận - Huyện',

            'ward.required'             => 'Bạn chưa chọn Xã - Phường',

            'radioCheckout.required'    => 'Bạn chưa chọn phương thức thanh toán',
        ];
    }
}
