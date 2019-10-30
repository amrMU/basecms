<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;

class PagesController extends Controller
{
    public function getPage($id,$url)
    {
    	$page =Pages::where('id',$id)->where('status','show')->first();

    	if ($page == null) {
			return abort(404);
		}

    	return view('front.pages.show',compact('page'));
    }
}
