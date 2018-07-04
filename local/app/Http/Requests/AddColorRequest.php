<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddColorRequest extends FormRequest
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
            //
            'name'=>'unique:prod_color,value'
        ];
    }
    public function messages()
    {
        return [
            //
            'name.unique'=>'Màu sản phẩm này đã tồn tại'
        ];
    }
}

