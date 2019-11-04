<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TestMonials,App\Category;
use App\Http\Requests\Admin\TestmonialsRequest;
use Jenssegers\Agent\Agent;
use App\Helpers\DoFire;
use Session;
use Auth;

class TestmonialsController extends Controller
{
    public $view = 'dashboard.testmonials';
    
    public function __construct(TestMonials $testmonials)
	{
        $this->testmonials = $testmonials;
	}	

	public function index(Request $request)
    {
        $testmonials = $this->testmonials->all();
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_testmonials','text'=>'Brwose view Testmonial list','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$testmonials,$request->ipinfo);
		return view($this->view.'.index',compact('testmonials'));		

    }

    public function create(Request $request)
    {
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_view_create_new_testmonials','text'=>'Brwose View Create New Testmonials','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);
        $categories = Category::all(); 
        
		return view($this->view.'.create',compact('categories'));		
    }    


    public function store(TestmonialsRequest $request)
    {
        if($request->hasFile('image')){
            $file =$request->file('image'); 
			$time = time();
			$ext = $file->getClientOriginalExtension();
			$fullname = $time . '.' . $ext;
            $move = $file->move(public_path() .'/uploads/images/testmonials', $fullname);
            $path ='/uploads/images/testmonials';
            $image = $path.'/'.$fullname;
        }else{
            $image = '/img/avatar.png';
        }
       

         $testmonial = $this->testmonials->create([
                        'category_id'=>$request->category_id,
                        'title'=>$request->title,
                        'content'=>$request->content,
                        'image'=>$image
                    ]);
     
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_create_new_testmonials','text'=>'Brwose Create New Testmonials','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$testmonial,$request->ipinfo);

        session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }

        public function edit(Request $request,$id)
    {
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_view_create_new_testmonials','text'=>'Brwose View Create New Testmonials','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);
        $categories = Category::all(); 
        $info = $this->testmonials->find($id);

        if ($info == null) {
			return abort(404);
		}
			
		return view($this->view.'.edit',compact('categories','info'));		
    }   

    public function show($id)
    {
        # code...
    }


    public function update($id,TestmonialsRequest $request)
     {
     	 if ($this->testmonials->find($id) == null) {
			return abort(404);
		}
     	if($request->hasFile('image')){
            $file =$request->file('image'); 
			$time = time();
			$ext = $file->getClientOriginalExtension();
			$fullname = $time . '.' . $ext;
            $move = $file->move(public_path() .'/uploads/images/testmonials', $fullname);
            $path ='/uploads/images/testmonials';
            $image = $path.'/'.$fullname;
            $this->testmonials->find($id)->update([
                'image'=>$image
            ]);
        }
       

        $this->testmonials->find($id)->update([
                        'category_id'=>$request->category_id,
                        'title'=>$request->title,
                        'content'=>$request->content,
                    ]);
     
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_create_new_testmonials','text'=>'Brwose Create New Testmonials','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$this->testmonials->find($id),$request->ipinfo);

        session::flash('success',trans('home.message_success'));
        return redirect()->back();
     } 

    public function destroy($id,Request $request)
    {

       $agent = new Agent();
       $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
       $data = ['key'=>'dashboard_destroy_testmonial_id'.$id,'text'=>'Destroy testmonial Info','browser'=>$agent];
       $info  = $this->testmonials->find($id);

           DoFire::MK_REPORT($data,Auth::id(),$info,$request->ipinfo);
           $this->testmonials->destroy($id);
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();  
    }


    public function destroyAll(TestmonialsRequest $request)
    {

       $agent = new Agent();
       $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
       $data = ['key'=>'dashboard_destroy_testmonial_ids_['.json_encode($request->ids).']','text'=>'Destroy selected testmonial Info','browser'=>$agent];

        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);

        if ($request->has('ids')) {
            $this->testmonials->wherein('id',$request->ids)->delete();
        }else{
        $this->testmonials->truncate();
        }
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();  
    }


}
