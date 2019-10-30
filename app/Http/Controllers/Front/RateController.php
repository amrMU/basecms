<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RateRequest;
use App\Rate;
use Auth;
use Session;


class RateController extends Controller
{
    
    public function doRate(RateRequest $request,$ad_id)
    {
    	$do_rate = Rate::create([
    		'rate'=>$request->rate,
    		'title'=>$request->title,
    		'content'=>$request->content,
    		'ad_id'=>$ad_id,
    		'user_id'=>Auth::id(),
    		'image'=> '/img/avatar.png'
    	]);
	    Session::flash('success',trans('home.message_success'));
    	return redirect()->back();
    }
}
