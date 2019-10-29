<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class County extends Model
{
    use SoftDeletes;

    protected $table = 'countries';
  

    public function translations()
    {
    	return $this->hasMany('App\ContryTranslation','country_id','id');
    }
	
}
