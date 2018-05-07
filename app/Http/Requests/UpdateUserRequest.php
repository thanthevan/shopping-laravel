<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
           
            'name' => 'required',
            'phone'=> 'required|phone',
            'address'=> 'required',
            'birthday' => 'required|date',
            'password'=> 'required|min:6|max:20',
            'repassword'=> 'required|same:password',
           
        ];
    }
    public function messages(){
        return [
          
            'name.required' => 'Vui lòng nhập họ tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.phone' => 'Vui lòng nhập số điện thoại hợp lệ',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'repassword.required'=> 'Vui lòng nhập lại mật khẩu',
            'password.min'=> 'Mật khẩu ngắn hơn 6 ký tự',
            'password.max'=> 'Mật khẩu dài hơn 20 ký tự',
            'repassword.same'=> 'Nhập lại mật khẩu không khớp'

        ];
    }
}
