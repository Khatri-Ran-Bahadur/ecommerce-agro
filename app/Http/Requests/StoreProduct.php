<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required',
           'slug' => 'required|unique:products,slug,'.$this->slug.',slug',
           'description'=>'required',
           'thumbnail' => 'mimes:jpeg,bmp,png|max:2048',
           'status' => 'required|numeric',
           'category_id' => 'required',
           'price' => 'required|numeric',
           'discount' => 'required|numeric'
        ];
    }
}
