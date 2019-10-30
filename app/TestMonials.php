<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestMonials extends Model
{
    protected $table= "test_monials";
    protected $fillable = [
		    	'rate',
		    	'title',
		    	'content',
		    	'category_id',
		    	'image'
    ];


	public function category()
	{
        return $this->belongsTo('App\Category','category_id');		
	}
}
