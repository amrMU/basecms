<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fav extends Model
{
	protected $table =  "favs";
	protected  $fillable = [
		'ad_id',
		'user_id',
	];

	
	public function ad()
	{
		return $this->belongsTo('App\Ads','ad_id');
	}
}
