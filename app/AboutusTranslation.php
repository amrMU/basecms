<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutusTranslation extends Model
{
    protected $table="aboutus_translations";
    protected $fillable=[
    	'title',
    	'content',
    	'mission',
    	'goals',
    	'about_id'
    ];
}
