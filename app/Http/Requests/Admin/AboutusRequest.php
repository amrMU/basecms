<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AboutusRequest extends FormRequest
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
                'title.*'=>'required',
                'content.*'=>'required',
                'goals.*'=>'required',
                'mission.*'=>'required',
                'url'=>'required|unique:aboutus',
                'image'=>'mimes:jpeg,bmp,png,jpg',
        ];
    }
}
