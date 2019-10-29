<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\ProfileUpdateequest;
use App\County,App\User;
use Auth;
use Session;

class ProfileController extends Controller
{
	public $view = 'front.auth.';

    public function getProfile()
    {
    	$countries = County::all();

    	return view($this->view.'profile',compact('countries'));
    }

    public function PutUpdate(ProfileUpdateequest $request)
    {

    	  $update = User::find(Auth::id())->update([
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'country_id'=>$request->country_id,
            'phone'=>$request->phone,
        ]);

        if($request->has('password')){
            User::find(Auth::id())->update([
                'password'=>bcrypt($request->password),
            ]);
        }



        if($request->hasFile('image')){
            $file =$request->file('image'); 
			$time = time();
			$ext = $file->getClientOriginalExtension();
			$fullname = $time . '.' . $ext;
            $move = $file->move(public_path() .'/uploads/images/users', $fullname);
            $path ='/uploads/images/users';
            $image = $path.'/'.$fullname;
            User::where('id',Auth::id())->update(['image'=>$image]);
        }

        Session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }
}
