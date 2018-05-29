<?php

namespace App\Http\Requests;

class StatusRequest extends Request
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
            'name'          => 'required|max:50|unique:status,StatusName,'.$id.',StatusId',
            'icon'          => 'max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required'     => 'Bạn chưa nhập Tên Trạng thái',
            'name.max'          => 'Tên Trạng thái chứa tối đa 50 ký tự',
            'name.unique'       => 'Tên Trạng thái đã tồn tại',

            'icon.max'          => 'Icon chứa tối đa 255 ký tự',
        ];
    }
}
