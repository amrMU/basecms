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
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\CategoryRequest;
use App\Exports\CategoriesListExport;
use Jenssegers\Agent\Agent;
use App\Helpers\DoFire;
use App\Category,App\CategoryTranslation;
use Session;
use Auth;
use DB;
class CategoriesController extends Controller
{
    public $view = 'dashboard';
    
    public function __construct(Category $category)
	{
        $this->category = $category;
	}	    


    public function ExportExelSheet(Request $request)
    {
        $lists = DB::table('categories')
                             ->join('category_translations','categories.id','category_translations.category_id')
                             ->groupby('category_translations.category_id')
                             ->distinct()
                            ->select(
                                 'categories.id',
                                'category_translations.name',
                                'category_translations.lang_id',
                                'categories.parent_id'
                            )->get();
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_export_Categories_list','text'=>'Export Categories List','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$lists,$request->ipinfo);

        return  Excel::download(new CategoriesListExport,'categories_list.xlsx');
    }

    public function index(Request $request)
    {
        $categories = $this->category->with('category_translation')->get();
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_categories','text'=>'Brwose view Category list','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$categories,$request->ipinfo);
		return view($this->view.'.categories.index',compact('categories'));		

    }

    public function create(Request $request)
    {
        $categories = $this->category->with('category_translation')->get();
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_view_create_category','text'=>'Brwose view New Category','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);

		return view($this->view.'.categories.create',compact('categories'));		
    }

    public function store(CategoryRequest $request)
    {
        if($request->hasFile('icon')){
            $file =$request->file('icon'); 
			$time = time();
			$ext = $file->getClientOriginalExtension();
			$fullname = $time . '.' . $ext;
            $move = $file->move(public_path() .'/uploads/images/categories', $fullname);
            $path ='/uploads/images/categories';
            $image = $path.'/'.$fullname;
        }else{
            $image = '/img/no_image.png';
        }
        if($request->has('parent_id')){
            $parent_id  = $request->parent_id;
        }else{
            $parent_id  = NULL;  
        }
         $category = $this->category->create([
                       'meta_tags'=>$request->meta_tags,
                        'parent_id'=>$parent_id,
                        'icon'=>$image
                    ]);
         $translations = [];
         foreach ($request->name as $key => $value) {
            $translations = CategoryTranslation::create([
                'name'=>$request->name[$key],
                'category_id'=>$category->id,
                'lang_id'=>$request->lang[$key],
            ]);
         }

        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_create_category','text'=>'Brwose Create  New Category','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$category,$request->ipinfo);

        session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }

    public function edit(Request $request,$id)
    {
        $categories = $this->category->all();
        $info = $this->category->find($id);
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_view_edit_category','text'=>'Brwose view edit Category','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);

		return view($this->view.'.categories.edit',compact('categories','info'));		
    }

    public function update(CategoryRequest $request,$id)
    {
        if($request->hasFile('icon')){
            $file =$request->file('icon'); 
			$time = time();
			$ext = $file->getClientOriginalExtension();
			$fullname = $time . '.' . $ext;
            $move = $file->move(public_path() .'/uploads/images/categories', $fullname);
            $path ='/uploads/images/categories';
            $image = $path.'/'.$fullname;
            $this->category->where('id',$id)->update([
                'icon'=>$image
            ]);
        }

        if($request->has('parent_id')){
            $parent_id  = $request->parent_id;
        }else{
            $parent_id  = NULL;  
        }
         $category = $this->category->find($id)->update([
                        'meta_tags'=>$request->meta_tags,
                        'parent_id'=>$parent_id,
                    ]);

       CategoryTranslation::where('category_id',$id)->delete();

         $translations = [];
         foreach ($request->name as $key => $value) {
            $translations = CategoryTranslation::create([
                'category_id'=>$id,
                'name'=>$request->name[$key],
                'lang_id'=>$request->lang[$key],

            ]);
         }
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_browse_create_category','text'=>'Brwose Create  New Category','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$category,$request->ipinfo);

        session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }
    public function destroy(Request $request,$id)
    {
        $category = $this->category->find($id);
        $agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_delete_category','text'=>'Brwose Delete Category','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$category,$request->ipinfo);

        $this->category->destroy($id);
        session::flash('success',trans('home.message_success'));
        return redirect()->back();
    }

     public function destroyAll(Request $request)
    {

       $agent = new Agent();
       $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
       $data = ['key'=>'dashboard_destroy_categories_ids_['.json_encode($request->ids).']','text'=>'Destroy selected categories Info','browser'=>$agent];

        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);

        if ($request->has('ids')) {
            $this->category->wherein('id',$request->ids)->delete();
        }else{
        $this->category->truncate();
        }
        Session::flash('success',trans('home.message_success'));
        return redirect()->back();  
    }

}
