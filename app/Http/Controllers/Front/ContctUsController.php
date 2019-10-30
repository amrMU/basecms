<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ContactUsRequest;
use App\Contactus;
use Session;

class ContctUsController extends Controller
{
    public function getSendAsk()
    {
    	return view('front.contactus');
    }


    public function posttSendAsk(ContactUsRequest $request)
    {
    	Contactus::create([
    			'name'=>$request->name,
				'subject'=>$request->subject,
				'email'=>$request->email,
				'message'=>$request->message,
    	]);
		 Session::flash('success',trans('home.message_success'));
    	return redirect()->back();
    }
}
