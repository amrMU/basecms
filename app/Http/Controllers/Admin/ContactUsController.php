<?php
/*
*********************************
* Name: Amr Muhamed             *
* Email: amrmuhamed9@gmail.com  *
* Phone: +201061637022          *
* Copywrits @amrMU Githup       *
* *******************************
*/
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Jenssegers\Agent\Agent;
use App\Helpers\DoFire;
use App\ContctUs;
use Session;
use Auth;


class ContactUsController extends Controller
{
	 public $view = 'dashboard.contactus.';
    
    public function __construct(ContctUs $contact)
	{
        $this->contact = $contact;
	}

    public function list(Request $request)
    {
    	$lists = $this->contact->all();
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_contact_us','text'=>'Browse contact_us ','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$lists,$request->ipinfo);
    	return view($this->view.'index',compact('lists'));
    }

    public function destroy($id,Request $request)
    {
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_delete_contact_us_id_'.$id,'text'=>'delete contact_us ','browser'=>$agent];
        $info = $this->contact->find($id);
        DoFire::MK_REPORT($data,Auth::id(),$info,$request->ipinfo);
        $this->contact->destroy($id);
        session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }
}
