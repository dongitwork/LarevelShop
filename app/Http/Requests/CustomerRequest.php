<?php

namespace App\Http\Requests;

class CustomerRequest extends Request
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
            'fullname'          => 'required|max:50',
            'email'             => 'required|email|max:100|unique:customer,Email,'.$id.',CustomerId',
            'password'          => 'sometimes|required|min:6|max:100',
            'password_confirm'  => 'required|same:password|min:6|max:100',
            'phone'             => 'numeric|digits_between:1,20',
        ];
    }

    // overriding the messages method
    public function messages(){
        return [
            'fullname.required'         => 'Bạn chưa nhập Họ Tên',
            'fullname.max'              => 'Tên bạn chỉ chứa tối đa 50 ký tự',

            'email.required'            => 'Bạn chưa nhập Email',
            'email.email'               => 'Định dạng Email không hợp lệ',
            'email.unique'              => 'Email bạn nhập đã tồn tại',
            'email.max'                 => 'Email chứa tối đa 100 ký tự',

            'password.required'         => 'Bạn chưa nhập Mật khẩu',
            'password.min'              => 'Mật khẩu chứa tối thiểu 6 ký tự',
            'password.max'              => 'Mật khẩu chứa tối đa 100 ký tự',

            'password_confirm.required' => 'Hãy xác nhận lại Mật khẩu',
            'password_confirm.same'     => 'Mật khẩu xác nhận không trùng khớp',
            'password_confirm.min'      => 'Mật khẩu chứa tối thiểu 6 ký tự',
            'password_confirm.max'      => 'Mật khẩu chứa tối đa 100 ký tự',

            'phone.numeric'             => 'Bạn đã nhập ký tự không phù hợp',
            'phone.digits_between'      => 'Điện thoại chứa tối đa 20 ký tự',
        ];
    }
}
