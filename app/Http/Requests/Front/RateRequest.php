<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class RateRequest extends FormRequest
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
                    'rate'=>'required|numeric',
                    // 'title'=>'required',
                    // 'content'=>'required',
                    'image'=>'mimes:jpeg,bmp,png,jpg',
                ];
            }
            case 'PUT':
            {
                return [
                    // 'category_id'=>'required|numeric',
                    // 'title'=>'required',
                    // 'content'=>'required',
                    // 'image'=>'mimes:jpeg,bmp,png,jpg',
                ];
            }
            case 'PATCH':

        }
    }
}
