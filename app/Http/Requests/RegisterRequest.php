<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'emailres' => 'required|email|uq',
            'nameres' => 'required',
            'phoneres'=> 'required|phone',
            'addressres' => 'required',
            'passwordres'=> 'required|min:6|max:20',
            'repassword'=> 'required|same:passwordres',
           
        ];
    }
    public function messages(){
        return [
            'emailres.required' => 'Vui lòng nhập email',
            'emailres.uq' => 'Email đã được sử dụng',
            'emailres.email' => 'Vui lòng nhập email hợp lệ',
            'nameres.required' => 'Vui lòng nhập họ tên',
            'phoneres.required' => 'Vui lòng nhập số điện thoại',
            'phoneres.phone' => 'Vui lòng nhập số điện thoại hợp lệ',
            'addressres.required' => 'Vui lòng nhập địa chỉ',
            'passwordres.required' => 'Vui lòng nhập mật khẩu',
            'repassword.required'=> 'Vui lòng nhập lại mật khẩu',
            'passwordres.min'=> 'Mật khẩu ngắn hơn 6 ký tự',
            'passwordres.max'=> 'Mật khẩu dài hơn 20 ký tự',
            'repassword.same'=> 'Nhập lại mật khẩu không khớp'

        ];
    }
}
