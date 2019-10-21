<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdsTranslations extends Model
{
    use SoftDeletes;

    protected $table = "ads_translations";
    protected $filable = [
    	'ad_id',
		'lang_id',
		'title',
		'address',
		'content',
		'space',
		'bed_room',
		'bathroom',
		'parking',
    ];
}
