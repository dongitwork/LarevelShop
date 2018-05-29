<?php

namespace App\Http\Requests;


class UserRequest extends Request
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
        $id = $this->route('id');
        return [
            'username' => 'required|max:50',
            'email'    => 'required|email|max:100|unique:user,Email,'.$id.',UserId',
            'password' => 'sometimes|required|min:6|max:100',
            'address'  => 'required',
            'birthday' => 'required',
            'phone'    => 'required|numeric|digits_between:1,20',
        ];
    }

    // overriding the messages method
    public function messages()
    {
        return [
            'username.required'     => 'Bạn chưa nhập Tên thành viên',
            'username.max'          => 'Tên thành viên chứa tối đa 50 ký tự',

            'email.required'        => 'Bạn chưa nhập Email',
            'email.email'           => 'Định dạng Email không hợp lệ',
            'email.unique'          => 'Email bạn nhập đã tồn tại',
            'email.max'             => 'Email chứa tối đa 100 ký tự',

            'password.required'     => 'Bạn chưa nhập Mật khẩu',
            'password.min'          => 'Mật khẩu chứa tối thiểu 6 ký tự',
            'password.max'          => 'Mật khẩu chứa tối đa 100 ký tự',

            'address.required'      => 'Bạn chưa nhập Địa chỉ',

            'birthday.required'     => 'Bạn chưa nhập Ngày sinh',

            'phone.required'        => 'Bạn chưa nhập Số điện thoại',
            'phone.numeric'         => 'Bạn đã nhập ký tự không phù hợp',
            'phone.digits_between'  => 'Điện thoại chứa tối đa 20 ký tự',
        ];
    }
}
