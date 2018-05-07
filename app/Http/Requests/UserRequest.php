<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'phone'=> 'required|phone',
            'address' => 'required',
           
        ];
    }
    public function messages(){
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã được sử dụng',
            'email.email' => 'Vui lòng nhập email hợp lệ',
            'name.required' => 'Vui lòng nhập họ tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.phone' => 'Vui lòng nhập số điện thoại hợp lệ',
            'address.required' => 'Vui lòng nhập địa chỉ',
            
        ];
    }
}
