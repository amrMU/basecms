<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use   Illuminate\Foundation\Auth\ThrottlesLogins;

class CustomAuthController extends Controller
{
use ThrottlesLogins;
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function adminLogin()
    {
    	return view('auth.dashboard.login');
    }
    
    public function Getsignup()
    {
        return view('auth.signup');
    }

   



}
