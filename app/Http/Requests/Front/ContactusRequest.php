<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ContactusRequest extends FormRequest
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
          'phone'=>'required|min:5|max:15',
          'name'=>'required|min:5|max:180',
          'subject'=>'required',
          'email'=>'required|email',
          'message'=>'required|min:5|max:180',
        ];
    }
}
