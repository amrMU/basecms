<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use LaravelLocalization;
class Category extends Model
{
    protected $table = "categories";
	protected $fillable  = [
       'meta_tags',
        'parent_id',
        'icon'
		
	];
	 
	protected $hidden=  ['created_at','updated_at'];

	public function category()
	{
		return $this->belongsTo('App\Category','parent_id');
	}

	public function category_translation()
	{
        return $this->belongsTo('App\CategoryTranslation','id','category_id');		
	}
	
	public function translations()
	{
        return $this->hasMany('App\CategoryTranslation','category_id','id')->orderBy('created_at','DESC');		
	}

	public function sub_categories()
	{
        return $this->hasMany('App\Category','parent_id','id')->orderBy('created_at','DESC');		
	}
}
