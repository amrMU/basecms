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
use App\Ads,App\AdsTranslations,App\AdsImages;
use App\Category;
use  App\Http\Requests\Admin\AdsRequest;
use App\Http\Controllers\ImagesController;
use Jenssegers\Agent\Agent;
use App\Helpers\DoFire;
use Auth;
use Session;

class AdsController extends Controller
{
    public $view = 'dashboard.ads.';

    public function __construct(
			Ads $ads,
			AdsTranslations $translation,
			AdsImages $images
		)
	{
        $this->ads = $ads;
        $this->translation = $translation;
        $this->images = $images;
	}


	/*
	*
	* 	Getting Edit Ads View
	*	@return view with data
	*	@method GET
	*
	**/
	public function index(Request $request)
	{
		$ads= $this->ads->with('images')->get(); 

		$agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_List_Ad','text'=>'List New Add  ','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);

		return view($this->view.'index',compact('ads'));
	}


	public function create(Request $request)
	{
		$agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_show_Create_Ad','text'=>'Show Create New Add  ','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),null,$request->ipinfo);

		return view($this->view.'create');
	}

	public function store(AdsRequest $request)
	{
		if ($reqest->has('sub_categoris')) {
			$category_id = $request->sub_categoris;
		}else{
			$category_id = $request->category_id;
		}

		$create_ad = $this->ads->create([
						'category_id'=>$category_id,
						'user_id'=>Auth::id(),
						'price'=>$request->price,
						'url'=>$request->url,
						'map'=>$request->map,
						'meta_tags'=>$request->meta_tags,
						'status'=>$request->status,
						'space'=>$request->space,
						'bed_ro=>$request->bed_room'=>$request->om,
						'bathroom'=>$request->bathroom,
						'parking'=>$request->parking,
					]);//end save base info
		
		if ($request->has('lang')) {
			$translation = [];
			foreach ($request->lang as $key => $lang) {
			$translation =	$this->translation->create([
									'ad_id'=>$create_ad->id,
									'lang_id'=>$lang,
									'title'=>$request->title[$key],
									'address'=>$request->address[$key],
									'content'=>$request->content[$key],
								]);
			}//end loop save translation
		}//end languages when we lave lang

		if ($request->has('images')) {
			$set_images_path_db = [];
			$upload_images = ImagesController::upload_multiple(
				$request->images,
				public_path().'/uploads/images/ads',
				'/uploads/images/ads',
				);

			foreach ($upload_images as $key => $image) {
				$set_images_path_db = $this->images->create([
					'image'=>$image,
					'ad_id'=>$create_ad->id
				]);
			}//end loop save images
		}//end images case when we have images

		$agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_Store_New_Ad','text'=>'Store New Add  ','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$create_ad,$request->ipinfo);
        Session::flash('success',trans('home.message_success'));

		return redirect()->back();
	}

	/*
	*
	* 	Getting Edit Ads View
	*	@return view with data
	*	@method GET
	*
	**/
	public function edit($id,Request $request)
	{
		$info= $this->ads->find($id); 
		$sub_categories= Category::where('parent_id',$info->category->parent_id)->get(); 
		$agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_edit_Ad_id_'.$id,'text'=>'Show Create New Add  ','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$info,$request->ipinfo);
		return view($this->view.'edit',compact('info','sub_categories'));
	}

	public function update($id,AdsRequest $request)
	{
		$update  = $this->ads->find($id)->update([
						'category_id'=>$request->category_id,
						'user_id'=>Auth::id(),
						'price'=>$request->price,
						'url'=>$request->url,
						'map'=>$request->map,
						'meta_tags'=>$request->meta_tags,
						'status'=>$request->status,
						'type_ad'=>$request->add_type,
						'space'=>$request->space,
						'bed_ro=>$request->bed_room'=>$request->om,
						'bathroom'=>$request->bathroom,
						'parking'=>$request->parking,
					]);//end save base info

		if ($request->has('lang')) {

			$this->translation->where('ad_id',$id)->delete();
			$translation = [];
			foreach ($request->lang as $key => $lang) {
			$translation =	$this->translation->create([
									'ad_id'=>$id,
									'lang_id'=>$lang,
									'title'=>$request->title[$key],
									'address'=>$request->address[$key],
									'content'=>$request->content[$key],
								]);
			}//end loop save translation
		}//end languages when we lave lang

		if ($request->has('images')) {
			$set_images_path_db = [];
			$upload_images = ImagesController::upload_multiple(
				$request->images,
				public_path().'/uploads/images/ads',
				'/uploads/images/ads',
				);

			foreach ($upload_images as $key => $image) {
				$set_images_path_db = $this->images->create([
					'image'=>$image,
					'ad_id'=>$id
				]);
			}//end loop save images
		}//end images case when we have images

		$agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboard_Store_New_Ad','text'=>'Store New Add  ','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$this->ads->find($id),$request->ipinfo);
        Session::flash('success',trans('home.message_success'));

		return redirect()->back();
	}


	public function DestroyImage($image_id,Request $request)
	{
		$image = $this->images->where('id',$image_id)->first();
		$agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboar_remove_add_image_id_$'.$image_id,'text'=>'Remove Ad Image','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$image,$request->ipinfo);
		$this->images->where('id',$image_id)->delete();
        Session::flash('success',trans('home.message_success'));
		return redirect()->back();
	}

	public function Destroy($ad_id,Request $request)
	{
		$this->ads->where('id',$ad_id)->delete();
		$agent = new Agent();
        $agent = $agent->platform().','.$agent->browser().$agent->version($agent->browser());
        $data = ['key'=>'dashboar_remove_add_image','text'=>'Remove Ad Image','browser'=>$agent];
        DoFire::MK_REPORT($data,Auth::id(),$this->ads->find($ad_id),$request->ipinfo);
        Session::flash('success',trans('home.message_success'));
		return redirect()->back();
	}

}
