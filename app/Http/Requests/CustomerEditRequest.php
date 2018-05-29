<?php

namespace App\Http\Requests;

class CustomerEditRequest extends Request
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
            'phone'         => 'numeric|digits_between:1,20',
            'address'       => 'max:255',
        ];
    }
    public function messages(){
        return [
            'name.required'         => 'Bạn chưa nhập Họ Tên',
            'name.max'              => 'Tên bạn chỉ chứa tối đa 50 ký tự',

            'phone.numeric'         => 'Bạn đã nhập ký tự không phù hợp',
            'phone.digits_between'  => 'Điện thoại chứa tối đa 20 ký tự',

            'address.max'           => 'Địa chỉ chứa tối đa 255 ký tự',
        ];
    }
}
