<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\County;
use App\ContryTranslation;

class CountriesController extends Controller
{
	 public $view = 'dashboard.countries.';
    
    public function __construct(County $countries)
	{
        $this->countries = $countries;
	}

    public function create()
    {
    	return view()
    }
}
