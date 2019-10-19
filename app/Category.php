<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Category extends Model
{
    protected $table = "categories";
	protected $fillable  = [
       'meta_tags',
        'parent_id',
        'icon'
		
	];
	 

	public function category()
	{
		return $this->belongsTo('App\Category','parent_id');
	}

	public function category_translation()
	{
        return $this->belongsTo('App\CategoryTranslation','id','category_id')->where('language','ar');
		
	}
}
