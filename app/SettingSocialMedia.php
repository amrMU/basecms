<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelLocalization;
class SettingSocialMedia extends Model
{
	// use SoftDeletes;
	
	protected $table = "setting_social_media";
    protected $fillable = [
	    'setting_id',
	    'icon',
	    'url',
    ];

   

  
}
