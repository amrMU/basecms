<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ads,App\Category;

class SearchController extends Controller
{
    public function search(Request $request,$category_id)
    {
    	$ads = Ads::where('category_id',$category_id)->get();
    	if($request->has('category_id')){
    		$ads = $ads->where('status','show')->where('category_id',$request->category_id);
    	}elseif( $request->has('type_ad')){
    		$ads = $ads->where('status','show')->where('type_ad',$request->type_ad);
    	}elseif ($request->has('category_id')  && $request->has('type_ad')) {
            $ads = $ads->where('status','show')->where('category_id',$request->category_id)->where('type_ad',$request->type_ad);
        }
        	$category = Category::find($request->category_id);
    	return view('front.categories.search',compact('ads','category'));
    }
}
