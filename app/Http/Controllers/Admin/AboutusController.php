<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aboutus,App\AboutusTranslation;
use App\Http\Requests\Admin\AboutusRequest;
use Jenssegers\Agent\Agent;
use App\Helpers\DoFire;
use App\Http\Controllers\ImagesController;
use Session;
use Auth;
class AboutusController extends Controller
{
    public $view = 'dashboard.aboutus.';

    public function __construct(
			Aboutus $about,
			AboutusTranslation $translation
		)
	{
        $this->about = $about;
        $this->translation = $translation;
	}

	public function create()
	{
		$info  = $this->about->with('translation')->first();
		return view($this->view.'update',compact('info'));
	}

	public function save(AboutusRequest $request)
	{
		if ($this->about->count() > 0 ) {
			$info_id= $this->about->first()->id;
			AboutusController::update($request->all(),$info_id);
		}else{
			$info = AboutusController::store($request->all());
		}

		Session::flash('success',trans('home.message_success'));
		return redirect()->back();
	}

	public function store($request)
	{
		$create = $this->about->create([
			'url'=>$request['url'],
			'meta_tags'=>$request['meta_tags'],
		]);

		$set_translation= 	AboutusController::translation($request,$create->id);

			if(isset($request['image'])){
				$image =ImagesController::uploadSingle(
					$request['image'],
					$path=public_path().'/uploads/images/pages/'.str_replace( ' ','_',$create->translation->title),
					$db_path = '/uploads/images/pages/'.str_replace( ' ','_',$create->translation->title)
				);
				$this->about->find($create->id)->update([
					'image'=>@$image,
				]);
			}
		return $create ;
	}
	public function update($request,$id)
	{
		$update = $this->about->find($id)->update([
			'url'=>$request['url'],
			'meta_tags'=>$request['meta_tags']
		]);

		

		$set_translation= 	AboutusController::translation($request,$id);

			if(isset($request['image'])){
				$image =ImagesController::uploadSingle(
					$request['image'],
					$path=public_path().'/uploads/images/pages/'.str_replace( ' ','_',$this->about->find($id)->translation->title),
					$db_path = '/uploads/images/pages/'.str_replace( ' ','_',$this->about->find($id)->translation->title)
				);
				$this->about->find($id)->update([
					'image'=>@$image,
				]);
			}
		return $update;
	}

	public function translation($request,$about_id)
	{
		$reset_translation = $this->translation->where('about_id',$about_id)->delete();
		$translations = [];
		foreach ($request['title'] as $key => $value) {
			$translations = $this->translation->create([
				'title'=>$request['title'][$key],
		    	'content'=>$request['content'][$key],
		    	'mission'=>$request['mission'][$key],
		    	'goals'=>$request['goals'][$key],
		    	'about_id'=>$about_id
			]);
		}

		return $translations;

	}
}
