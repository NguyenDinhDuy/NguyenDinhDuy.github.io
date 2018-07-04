<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
//        $rules = [];
////        $rule1s = [];
//
//        $gender = $this->input('color');
//        foreach ($gender as $index => $item) {
//            $rules["color.{$index}"] = 'required';
//        }

//        $gender1 = $this->input('size');
//        foreach ($gender1 as $index => $item) {
//            $rule1s["size.{$index}"] = 'required';
//        }

        return [
            //
            'img' => 'image',
            'name' => 'unique:products,prod_name',
            'code' => 'unique:products,prod_code',
            'description' => 'required',
            'img' => 'required',
            'cate' => 'not_in:0',
//            $rules,
            'size' => 'required|array|not_in:0',
            'color' => 'required|array|not_in:0',
//            $rule1s,
//            'color'=>'not_in:0',
//            'size'=>'not_in:0'
//            'promotion'=>'max:price'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'code.unique' => 'Mã sản phẩm đã tồn tại',
            'description.required' => 'Bạn phải điền trường mô tả sản phẩm',
            'img.required' => 'Bạn phải chọn ảnh đại diện cho sản phẩm',
            'cate.not_in' => 'Bạn phải chọn danh mục cho sản phẩm',
            'color.required' => 'Bạn phải chọn màu cho sản phẩm',
            'size.required' => 'Bạn phải chọn size cho sản phẩm',
            'color.not_in' => 'Bạn phải chọn màu cho sản phẩm',
            'size.not_in' => 'Bạn phải chọn size cho sản phẩm',
//            'promotion.max'=>'Gíá khuyến mãi chỉ được phép nhỏ hơn hoặc bằng giá gốc của sản phẩm'
//            'initial_page' => 'required_with:end_page|integer|min:1|digits_between: 1,5',
//            'end_page' => 'required_with:initial_page|integer|greater_than_field:initial_page|digits_between:1,5'
        ];
    }
}
