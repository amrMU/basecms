<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    use SoftDeletes;
    protected $table = "pages";
    protected $fillable = [
       'url',
        'meta_tags',
        'icon',
        'status',
    ];

    public function setIconAttribute($icon)
    {
        if (Input::hasFile('icon')) {
            //time 
            $time = time();
            // get file extention
            $ext  =Input::file('icon')->getClientOriginalExtension();
            //make name as time and extention
            $fullname = $time . '.' . $ext;
            //uplode image to path
            Input::file('icon')->move(public_path() .'/uploads/images/pages', $fullname);
            //get image with path
            $path ='/uploads/images/pages';
            //upload to thumb path
            // save image name to data base
            $this->attributes['icon'] =$path.'/'.$fullname;
        }
    }

    public function setUrlAttribute($url)
    {
        return  $this->attributes['url'] = str_replace(' ', '_', $url);
    }

    public function translation()
    {
        return $this->belongsTo('App\PagesTranslation','id','page_id');
        
    }

    public function translations()
    {
        return $this->hasMany('App\PagesTranslation','page_id','id');
        
    }
}
