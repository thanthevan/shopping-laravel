<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedBackRequest extends FormRequest
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
            'title'=> 'required',
            'content' => 'required',
           
           
        ];
    }
    public function messages(){
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'name.required' => 'Vui lòng nhập họ tên',
            'title.required' => 'Vui lòng chọn danh mục',
            'content.required' => 'Vui lòng nhập nội dung'
            

        ];
    }
}
