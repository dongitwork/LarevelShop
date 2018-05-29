<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaxRequest extends Request
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
            'tax_name' => 'required|max:100|unique:tax,TaxName,'.$id.',TaxId',
        ];
        
    }

    public function messages()
    {
        return [
            'tax_name.required' => 'Bạn chưa nhập Tên thuế',
            'tax_name.max'      => 'Tên thuế chứa tối đa 100 ký tự',
            'tax_name.unique'   => 'Tên thuế đã tồn tại',
            'percent.max'       => 'Phần trăm thuế chứa tối đa 4 chữ số và phải là số nguyên',
        ];
    }
}
