<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ads,App\AdsTranslations,App\AdsImages;
use  App\Http\Requests\Admin\AdsRequest;
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


	public function create()
	{
		return view($this->view.'create');
	}

	public function store(AdsRequest $request)
	{
		# code...
	}


}
