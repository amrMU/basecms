<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	public $view = 'front.auth.';

    public function getProfile()
    {
    	return view($this->view.'profile');
    }
}
