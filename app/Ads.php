<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ads extends Model
{
	use SoftDeletes;

    protected $table = "ads";
    protected $filable = [
    	'price',
    	'url',
    	'map',
    	'meta_tags',
    	'status',
    ];
}
