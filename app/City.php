<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "cities";
    protected $fillable  =[
        'nameAr','nameEn','country_id'
    ];

  	public function translation()
    {
    	return $this->belongsTo('App\CityTranslation','city_id');
    }
	
}
