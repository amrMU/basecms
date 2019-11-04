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
use App\Http\Requests\Admin\PageRequest;
use App\Pages,App\PagesTranslation;
use Jenssegers\Agent\Agent;
use App\Helpers\DoFire;
use Auth;
use Session;

class PagesController extends Controller
{
    public $view = 'dashboard';
    
    public function __construct(Pages $pages,PagesTranslation $translation)
  	{
          $this->pages = $pages;
          $this->translation = $translation;
  	}	    

    public function ExportExelSheet(Request $request)
    {
      # code...
    }

    public function index(Request $request)
    {
        $pages = $this->pages->all();
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_pages_list','text'=>'Browse browse Pages List','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$pages,$request->ipinfo);
    
        return view($this->view.'.pages.index',compact('pages'));
    }

    public function create(Request $request)
    {

        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
		    $data = ['key'=>'dashboard_create_page','text'=>'Browse Create Page','browser'=>$agent];
		    DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);
		
        return view($this->view.'.pages.create');
    }

    public function store(PageRequest $request)
    {
       $create = $this->pages->create($request->only('url','meta_tags','status','icon'));

       $create_translation = [];
       foreach ($request->title as $key => $value) {
          $create_translation = $this->translation->create([
            'page_id'=>$create->id,
            'title'=>$request->title[$key],
            'content'=>$request->content[$key],
            'lang_id'=>$request->lang[$key],
          ]);
       }
       $agent = new Agent();
       $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
       $data = ['key'=>'dashboard_create_page','text'=>'Browse Create Page','browser'=>$agent];
       DoFire::MK_REPORT($data,Auth::id(),$create,$request->ipinfo);
       
      Session::flash('success',trans('home.message_success'));
		  return redirect()->back();
    }

   public function edit(Request $request,$id)
    {

        $info  = $this->pages->find($id);
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_edit_page','text'=>'Browse edit Page','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$info,$request->ipinfo);
    
        return view($this->view.'.pages.edit',compact('info'));
    }

    public function update(PageRequest $request,$id)
    {
       $update = $this->pages->find($id)->update($request->only('url','meta_tags','status','icon'));


       $this->translation->where('page_id',$id)->delete();
       $create_translation = [];
       foreach ($request->title as $key => $value) {
          $create_translation = $this->translation->create([
            'page_id'=>$id,
            'title'=>$request->title[$key],
            'content'=>$request->content[$key],
            'lang_id'=>$request->lang[$key],
          ]);
       }
      
       $agent = new Agent();
       $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
       $data = ['key'=>'dashboard_update_page_info','text'=>'Browse update Page Info','browser'=>$agent];
       $info  = $this->pages->find($id);
       DoFire::MK_REPORT($data,Auth::id(),$info,$request->ipinfo);
       
      Session::flash('success',trans('home.message_success'));
      return redirect()->back();
    }

    public function destroy(Request $request,$id)
    {

       $agent = new Agent();
       $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
       $data = ['key'=>'dashboard_destroy_page_info','text'=>'Destroy Page Info','browser'=>$agent];
       $info  = $this->pages->find($id);

       DoFire::MK_REPORT($data,Auth::id(),$info,$request->ipinfo);
       $this->pages->destroy($id);
      Session::flash('success',trans('home.message_success'));
      return redirect()->back();
    }


    public function destroyAll(Request $request)
    {

       $agent = new Agent();
       $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
       $data = ['key'=>'dashboard_destroy_pages_ids_['.json_encode($request->ids).']','text'=>'Destroy selected pages Info','browser'=>$agent];

        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);

        if ($request->has('ids')) {
            $this->pages->wherein('id',$request->ids)->delete();
        }else{
        $this->pages->truncate();
        }
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();  
    }
}
