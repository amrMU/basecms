<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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

// dd($this->request->all());
                return [
                    'title.*'=>'required',
                    // 'title_en'=>'required',
                    'url'=>'required',
                    'icon'=>'required|mimes:jpeg,bmp,png,jpg',
                    'content.*'=>'required',
                    // 'content_en'=>'required'
                ];
            }
            case 'PUT':
            {
                return [
                    'title.*'=>'required',
                    'content.*'=>'required',
                    // 'title_en'=>'required',
                    // 'content_en'=>'required',
                    'url'=>'required',
                    'icon'=>'mimes:jpeg,bmp,png,jpg',
                ];
            }
            case 'PATCH':

        }
    }
}
