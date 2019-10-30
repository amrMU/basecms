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
use App\ContctUs;

class ContactUsController extends Controller
{
	 public $view = 'dashboard.contactus.';
    
    public function __construct(ContctUs $contact)
	{
        $this->contact = $contact;
	}

    public function list()
    {
    	$lists = $this->contact->all();
    	return view($this->view.'index',compact('lists'));
    }
}
