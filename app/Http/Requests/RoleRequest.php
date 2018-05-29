<?php

namespace App\Http\Requests;

class RoleRequest extends Request
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
            'role_name' => 'required|max:100|unique:role,RoleName,'.$id.',RoleId',
        ];
    }

    public function messages()
    {
        return [
            'role_name.required' => 'Bạn chưa nhập Tên Role',
            'role_name.max'      => 'Tên Role chứa tối đa 100 ký tự',
            'role_name.unique'   => 'Tên Role đã tồn tại',
        ];
    }
}
