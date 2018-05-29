<?php

namespace App\Http\Requests;

class LoginRequest extends Request
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
            'email'    => 'required|email|max:100',
            'password' => 'required|min:6|max:100',
        ];
    }

    public function messages()
    {
        return [
            'email.required'        => 'Bạn chưa nhập Email',
            'email.email'           => 'Định dạng Email không hợp lệ',
            'email.max'             => 'Email chứa tối đa 100 ký tự',

            'password.required'     => 'Bạn chưa nhập Mật khẩu',
            'password.min'          => 'Mật khẩu chứa tối thiểu 6 ký tự',
            'password.max'          => 'Mật khẩu chứa tối đa 100 ký tự',
        ];
    }
}
