<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChangePassRequest extends Request
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
            'old_pass'          => 'required|min:6|max:100',
            'new_pass'          => 'sometimes|required|min:6|max:100',
            'confirm_new_pass'  => 'required|same:new_pass|min:6|max:100',
        ];
    }

    public function messages(){
        return [
            'old_pass.required'         => 'Bạn chưa nhập Mật khẩu',
            'old_pass.min'              => 'Mật khẩu chứa tối thiểu 6 ký tự',
            'old_pass.max'              => 'Mật khẩu chứa tối đa 100 ký tự',

            'new_pass.required'         => 'Bạn chưa nhập Mật khẩu',
            'new_pass.min'              => 'Mật khẩu chứa tối thiểu 6 ký tự',
            'new_pass.max'              => 'Mật khẩu chứa tối đa 100 ký tự',

            'confirm_new_pass.required' => 'Hãy xác nhận lại Mật khẩu',
            'confirm_new_pass.same'     => 'Mật khẩu xác nhận không trùng khớp',
            'confirm_new_pass.min'      => 'Mật khẩu chứa tối thiểu 6 ký tự',
            'confirm_new_pass.max'      => 'Mật khẩu chứa tối đa 100 ký tự',
        ];
    }
}
