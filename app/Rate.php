<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
     protected $table= "rates";
    protected $fillable = [
		    	'rate',
		    	'title',
		    	'content',
		    	'ad_id',
		    	'user_id',
		    	'image'
    ];

    public function ad()
	{
        return $this->belongsTo('App\Ads','ad_id');		
	}

	public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
