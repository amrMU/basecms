<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateequest extends FormRequest
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
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|unique:users,id,'.@$this->segment(3),
            'country_id'=>'required|numeric',
            'phone'=>'required|numeric',
            'image'=>'mimes:jpeg,jpg,png,gif',
            'password'=> ['required', 
                           'min:6', 
                           'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/', 
                           'confirmed'],// English uppercase characters (A – Z) - English lowercase characters (a – z) - Base 10 digits (0 – 9) - Non-alphanumeric (For example: !, $, #, or %) - Unicode characters
        ];
    }
}
