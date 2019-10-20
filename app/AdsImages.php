<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsImages extends Model
{
	 use SoftDeletes;

    protected $table = "ads_images";
    protected $filable = [
    	'image',
    	'ad_id',
    ];
}
