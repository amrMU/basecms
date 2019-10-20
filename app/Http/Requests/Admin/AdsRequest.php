<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdsRequest extends FormRequest
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
        switch ($this->method()) {
        case 'GET':
        case 'DELETE':
            {
             return array();
        }
        case 'POST':
        {
            return [
                'category_id'=>'required',
                'title.*'=>'required',
                'content.*'=>'required',
                'address.*'=>'required',
                'language.*'=>'required',
                'image.*'=>'required|mimes:jpeg,bmp,png,jpg',
                'price'=>'required',
                'url'=>'required',
                'map'=>'required'
            ];
        }
        case 'PUT':
        {
            return [
                'title.*'=>'required',
                'address.*'=>'required',
                'language.*'=>'required',
                'image.*'=>'mimes:jpeg,bmp,png,jpg',
                'price'=>'required',
                'url'=>'required',
                'map'=>'required'
            ];
        }
        case 'PATCH':

        }
    }
}
