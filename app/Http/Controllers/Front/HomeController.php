<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public $view = 'front.';

	public function index()
	{
		return view($this->view.'index');
	}
}
