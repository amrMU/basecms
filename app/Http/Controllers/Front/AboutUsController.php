<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public $view = 'front.aboutus.';

    public function show()
    {
    	return view($this->view.'show');
    }
}
