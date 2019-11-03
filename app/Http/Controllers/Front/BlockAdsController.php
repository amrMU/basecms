<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Http\Requests\Front\BlockAdsRequest;
use App\BlockAds;
use Session;
use Auth;

class BlockAdsController extends Controller
{
    public function doReport(BlockAdsRequest $request,$ad_id)
    {
    	BlockAds::create([
	    	'ad_id'=>$ad_id,
	    	'user_id'=>Auth::id(),
	    	'message'=>$request->message,
    	]);
		 Session::flash('success',trans('home.message_success'));
    	return redirect()->back();
    }
}
