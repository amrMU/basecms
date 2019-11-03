<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
class Ads extends Model
{
	use SoftDeletes;

    protected $table = "ads";
    protected $fillable = [
    	'category_id',
        'user_id',
    	'price',
    	'url',
    	'map',
    	'meta_tags',
    	'status',
    	'space',
		'bed_room',
		'bathroom',
		'parking',
        'type_ad'
    ];

    public function rates()
    {
        return $this->hasMany('App\Rate','ad_id','id');
    }

    public function translations()
    {
        return $this->hasMany('App\AdsTranslations','ad_id','id');
    }

    public function images()
    {
        return $this->hasMany('App\AdsImages','ad_id','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function user_fav()
    {
        return $this->belongsTo('App\Fav','id','ad_id')->where('user_id',Auth::id());
    }

    public function blocked()
    {
        return $this->hasMany('App\BlockAds','ad_id','id');
    }


}
