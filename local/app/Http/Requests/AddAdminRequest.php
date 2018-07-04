<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAdminRequest extends FormRequest
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
            'email' => 'unique:admins,email',
            'password' => 'required|min:5|max:20',
            'repassword' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            //
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Bạn phải điền mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 5 kí tự',
            'password.max' => 'Mật khẩu phải có nhiều nhất 20 kí tự',
            'repassword.same'=>'Mật khẩu xác nhận không trùng khớp'
        ];
    }
}
