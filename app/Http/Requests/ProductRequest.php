<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        $photos = count($this->file('file'));
        foreach(range(0, $photos) as $index) {
            $rules['file.' . $index] = 'required|image|mimes:jpeg,jpg,gif,png|max:8024';
        }
 
     
         $rules =  [
            'product_name' => 'required',
            'category_product' => 'required',
            'color' => 'required',
            'size' => 'required',
            'unit_price' => 'required',
            'producer' => 'required',
            'content' => 'required',
            'metades' => 'required',
            'metakey' => 'required',
            
        ];
           return $rules;
    }
    public function messages(){
        return [
            'product_name.required' => 'Vui lòng nhập tên sản phẩm',
            'category_product.required' => 'Vui lòng chọn danh mục',
            'color.required' => 'Vui lòng chọn màu sắc',
            'size.required' => 'Vui lòng chọn kích cỡ',
            'unit_price.required' => 'Vui lòng nhập đơn giá',
            'producer.required' => 'Vui lòng nhập xuất xứ',
            'content.required' => 'Vui lòng nhập mô tả',
            'metades.required' => 'Vui lòng nhập Meta Description',
            'metakey.required' => 'Vui lòng nhập Meta Keywords'

        ];
    }
}
