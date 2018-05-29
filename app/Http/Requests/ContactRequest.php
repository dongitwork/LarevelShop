<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'name'              => 'required|max:50',
            'email'             => 'required|email|max:100',
            'title'             => 'max:100',
            'contact_content'   => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'             => 'Bạn chưa nhập Tên',
            'name.max'                  => 'Tên chứa tối đa 100 ký tự',

            'email.required'            => 'Bạn chưa nhập Email',
            'email.email'               => 'Định dạng Email không chính xác',
            'email.max'                 => 'Email chứa tối đa 100 ký tự',

            'contact_content.required'  => 'Bạn chưa nhập Nội dung',
        ];
    }
}
