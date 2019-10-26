<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ads,App\AdsTranslations,App\AdsImages;
use App\Category;
use  App\Http\Requests\Front\AdsRequest;
use App\Http\Controllers\ImagesController;
use Session;
use Auth;
class AdsController extends Controller
{
	public $view = 'front.ads.';

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


	public function index()
	{
		return view($this->view.'index');

	}


	public function create()
	{
		return view($this->view.'create');

	}



	public function store(AdsRequest $request)
	{

		$create_ad = $this->ads->create([
						'category_id'=>$request->category_id,
						'price'=>$request->price,
						'user_id'=>Auth::id(),
						'url'=>$request->url,
						'map'=>$request->map,
						'meta_tags'=>$request->meta_tags,
						// 'status'=>$request->status,
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

		 Session::flash('success',trans('home.message_success'));

		return redirect()->back();
	}


	public function show($id,$name)
	{
		$ad = $this->ads->find($id);
		// dd($);
		if ($ad == null) {
			return abort(404);
		}
		return view($this->view.'show',compact('ad'));
	}


}
