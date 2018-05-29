<?php

namespace App\Http\Requests;

class CategoryRequest extends Request
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
            'category_name' => 'required|max:100|unique:category,CategoryName,'.$id.',CategoryId',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Bạn chưa nhập Tên danh mục',
            'category_name.max'      => 'Tên danh mục chứa tối đa 100 ký tự',
            'category_name.unique'   => 'Tên danh mục đã tồn tại',
        ];
    }
}
