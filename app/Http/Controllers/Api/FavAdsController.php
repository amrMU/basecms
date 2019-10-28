<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fav;
use Response;
use Auth;
class FavAdsController extends Controller
{
    public function __construct(Fav $fav)
	{
        $this->fav = $fav;
	}

	public function fav($ad_id,$user_id)
	{
		// $data = Auth::id();
		$find_fav = $this->fav->where('ad_id',$ad_id)->where('user_id',$user_id)->first();

		if ($find_fav !== null) {
			$fav = $this->fav->where('ad_id',$ad_id)->where('user_id',$user_id)->delete();
			$msg = "UnFav";

		}else{
			$fav = $this->fav->create([
				'user_id'=>$user_id,
				'ad_id'=>$ad_id,
			]);
			$msg = "Fav";
		}
		$code = 200;
        $response = ["status" => $code,'message'=>$msg,'data'=>$find_fav];
        return Response::json($response,$code);
	}

	
}
