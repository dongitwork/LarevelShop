<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ManufacturerRequest extends Request
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
            'manufacturer_name' => 'required|max:100|unique:manufacturer,ManufacturerName,'.$id.',ManufacturerId',
        ];
    }

    public function messages()
    {
        return [
            'manufacturer_name.required' => 'Bạn chưa nhập Tên nhà sản xuất',
            'manufacturer_name.max'      => 'Tên nhà sản xuất chứa tối đa 100 ký tự',
            'manufacturer_name.unique'   => 'Tên nhà sản xuất đã tồn tại',
        ];
    }
}
