<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    protected $table="aboutus";
    protected $fillable=[
				'url',
				'meta_tags',
				'image',
    ];

    public function setUrlAttribute($url)
    {
        return  $this->attributes['url'] = str_replace(' ', '_', $url);
    }

   
    public function translation()
    {
    	return $this->belongsTo('App\AboutusTranslation','id','about_id')->where('language','ar');
    }
}
