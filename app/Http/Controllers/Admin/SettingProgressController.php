<?php
/*
*********************************
* Name: Amr Muhamed				*
* Email: amrmuhamed9@gmail.com 	*
* Phone: +201061637022 			*
* Copywrits @amrMU Githup 		*
* *******************************
*/
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Http\Controllers\Admin\SettingController;
use App\SettingMailProviderInfo,App\SettingAddress,App\SettingWatsapp;
use App\SettingPhone,App\SettingSocialMedia,App\SettingEmail;
use App\Http\Controllers\ImagesController,App\ExternalResources;
use App\SettingsTranslation;
use App\SettingLangs,App\Http\Requests\Admin\SettingsRequest;
use Auth;
class SettingProgressController extends Controller
{

	public static function create($request,$model)
	{
		$create_base_info = $model->create([
					            'meta_tags'=>$request['meta_tags'],
								// 'extirnal_code'=> isset($request['extirnal_code']) ? $request['extirnal_code'] : '',
					            'created_by'=>Auth::id()
							]);
		SettingProgressController::SiteLang($request,$model->first()->id);
		SettingProgressController::setTranslation($request,$model->first()->id);
		SettingProgressController::external_resources($request,$model->first()->id);
		SettingProgressController::store_mail_provider($request,$model->first()->id);
		SettingProgressController::store_email($request,$model->first()->id);
		SettingProgressController::store_phones($request,$model->first()->id);
		SettingProgressController::store_whatsapp($request,$model->first()->id);
		SettingProgressController::store_address($request,$model->first()->id);
		SettingProgressController::store_social_media_chanels($request,$model->first()->id);
		//has file
		if(isset($request['logo'])){
			$image =ImagesController::uploadSingle(
				$request['logo'],
				$path=public_path().'/uploads/images/logos/'.str_replace( ' ','_',$create_base_info->translation->title),
				$db_path = '/uploads/images/logos/'.str_replace( ' ','_',$create_base_info->translation->title)
			);
			$model->find($model->first()->id)->update([
				'logo'=>@$image,
			]);
		}
		//end upload file
		return $create_base_info;
	}

	public static function update($request,$model)
	{
		$update_base_info =  $model->find($model->first()->id)->update([
											
									            'meta_tags'=>$request['meta_tags'],
									            'created_by'=>Auth::id()
											]);

			
		SettingProgressController::SiteLang($request,$model->first()->id);
		SettingProgressController::setTranslation($request,$model->first()->id);
		SettingProgressController::external_resources($request,$model->first()->id);
		SettingProgressController::store_mail_provider($request,$model->first()->id);
		SettingProgressController::store_email($request,$model->first()->id);
		SettingProgressController::store_phones($request,$model->first()->id);
		SettingProgressController::store_whatsapp($request,$model->first()->id);
		SettingProgressController::store_address($request,$model->first()->id);
		SettingProgressController::store_social_media_chanels($request,$model->first()->id);
		//has file
		if(isset($request['logo'])){
			$image =ImagesController::uploadSingle(
				$request['logo'],
				$path=public_path().'/uploads/images/logos/'.str_replace( ' ','_',$model->first()->translation->title),
				$db_path = '/uploads/images/logos/'.str_replace( ' ','_',$model->first()->translation->title)
			);
			$model->find($model->first()->id)->update([
				'logo'=>@$image,
			]);
		}
			//end upload file

		return $update_base_info;
	}

	public static function SiteLang($request,$setting_id)
	{
		foreach ($request['languages'] as $key => $local) {
		$find = SettingLangs::where('lang_id',$local)->count();
			if ($find == 0 ) {
				SettingLangs::where('lang_id','!=',$local)->create([						'lang_id'=>$local,
					'setting_id'=>$setting_id
				]);
			}
		}
	}
	public static function setTranslation($request,$setting_id)
	{
		if (SettingsTranslation::count() > 0 ) {
			$delete_latest = SettingsTranslation::where('setting_id',$setting_id)->delete();
		}
		$translation = [];

		foreach ($request['title'] as $key => $value) {
		$translation = 	SettingsTranslation::create([
				'title'=>$request['title'][$key],
				'content'=>$request['content'][$key],
				'lang_id'=>$request['title_lang'][$key],
				'setting_id'=>$setting_id,
			]);
		}

	return $translation;
	}

	public static function external_resources($request,$setting_id)
	{
		if(isset($request['external_resources'])){
			$images =ImagesController::upload_multiple(
				$request['external_resources'],
				$path=base_path()
			);

			foreach ($images as $key => $image) {
				ExternalResources::create([
					'setting_id'=>$setting_id,
					'file'=>url('/').'/'.$image
				]);
			}
		}

		return "Okay";
	}

	public static function store_mail_provider($request,$setting_id)
	{
	if (SettingMailProviderInfo::count() > 0 ) {
		$delete_latest = SettingMailProviderInfo::where('setting_id',$setting_id)->forceDelete();
	}
	$insert_mail_info =	SettingMailProviderInfo::create([
			 		'setting_id'=>$setting_id,
				    'MAIL_DRIVER'=>$request['mail_driver'],
				    'MAIL_HOST'=>$request['mail_host'],
				    'MAIL_USERNAME'=>$request['mail_username'],
				    'MAIL_PASSWORD'=>$request['mail_password'],
				    'MAIL_port'=>$request['mail_port'],
					]);
		return $insert_mail_info;
	}


	public static function store_address($request,$setting_id)
	{
		if (SettingAddress::count() > 0 ) {
			$delete_latest = SettingAddress::where('setting_id',$setting_id)->forceDelete();
		}

		foreach ($request['address'] as $key => $address) {
			if($address != null ){

				$create_address = SettingAddress::create([
					'address_ar'=>$address,
					'address_en'=>$address,
					'setting_id'=>$setting_id
				]);
			}
		}
		return "Okay";
	}

	public static function store_email($request,$setting_id)
	{
		if (SettingEmail::count() > 0 ) {
			$delete_latest = SettingEmail::where('setting_id',$setting_id)->forceDelete();
		}

		foreach ($request['email'] as $key => $email) {
			if($request['department'][$key] != null && $email != null){
				$create_email = SettingEmail::create([
					'email'=>$email,
					'setting_id'=>$setting_id,
					'department'=>$request['department'][$key]
				]);
			}

		}

		return "Okay";
	}

	public static function store_phones($request,$setting_id)
	{
		if (SettingPhone::count() > 0 ) {
			$delete_latest = SettingPhone::where('setting_id',$setting_id)->forceDelete();
		}

		foreach ($request['phone'] as $key => $phone) {
			if($phone != null ){
				$create_phone = SettingPhone::create([
					'phone'=>$phone,
					'setting_id'=>$setting_id
				]);
			}
		}
		return "Okay";
	}

	public static function store_whatsapp($request,$setting_id)
	{
		if (SettingWatsapp::count() > 0 ) {
			$delete_latest = SettingWatsapp::where('setting_id',$setting_id)->forceDelete();
		}

		foreach ($request['whatsapp'] as $key => $whatsapp) {
			if($whatsapp != null ){
				$create_phone = SettingWatsapp::create([
					'whatsapp'=>$whatsapp,
					'setting_id'=>$setting_id
				]);
			}
		}
		return "Okay";
	}


	public static function store_social_media_chanels($request,$setting_id)
	{

		if (SettingSocialMedia::count() > 0 ) {
			$delete_latest = SettingSocialMedia::where('setting_id',$setting_id)->forceDelete();
		}
		$create_chanel = [];
		$media_translate = [];
		foreach ($request['url'] as $key => $url) {
			if($url != null){
				$create_chanel = SettingSocialMedia::create([
					'setting_id'=>$setting_id,
					'url'=>$url
				]);
				
				//has file
				if(isset($request['social_logo'][$key])){
					$image =ImagesController::uploadSingle(
						$request['social_logo'][$key],
						$path=public_path().'/uploads/images/logos/',
						'/uploads/images/logos/'
					);
					$create_chanel->update([
						'icon'=>@$image,
					]);
				}else{
					if (isset($request['social_img'][$key])) {
						$image = $request['social_img'][$key];
					}
					$create_chanel->update([
						'icon'=>@$image,
					]);
				}
				//end upload file	
				}

			}
// dd($request);

		return "Okay";
	}


	// public static function store_social_media_chanels($request,$setting_id)
	// {
	// 	if (SettingSocialMedia::count() > 0 ) {
	// 		$delete_latest = SettingSocialMedia::where('setting_id',$setting_id)->forceDelete();
	// 	}
	// 	$SettingSocialMedia = [];
	// 	$media_translate = [];
	// 	foreach ($request['name_media'] as $key => $brand) {
	// 		if($brand != null ){

	// 			$create_chanel = SettingSocialMedia::create([
	// 				'setting_id'=>$setting_id,
	// 				'url'=>$request['url'][$key]
	// 			]);
	// 			$media_translate = SettingsSocialMediaTranslate::create([
	// 				'setting_id'=>$setting_id,
	// 				'media_id'=>$create_chanel->id,
	// 				'lang_id'=>$request['social_media_lang'][$key],
	// 				'name'=>$request['name_media'][$key]
	// 			]);
	// 			//has file
	// 			if(isset($request['social_logo'][$key])){
	// 				$image =ImagesController::uploadSingle(
	// 					$request['social_logo'][$key],
	// 					$path=public_path().'/uploads/images/logos/'.$request['name_media'][$key],
	// 					'/uploads/images/logos/'.$request['name_media'][$key]
	// 				);
	// 			// dd(isset($request['social_logo'][$key]));
	// 				$create_chanel->update([
	// 					'icon'=>@$image,
	// 				]);
	// 			}
	// 			//end upload file
	// 		}
	// 	}
		
	// 	return "Okay";
	// }
}
