<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'size1' => 'array|not_in:0',
            'color1' => 'array|not_in:0',
        ];
    }
    public function messages()
    {
        return [
            'color1.not_in' => 'Bạn phải chọn màu cho sản phẩm',
            'size1.not_in' => 'Bạn phải chọn size cho sản phẩm',
        ];
    }
}
