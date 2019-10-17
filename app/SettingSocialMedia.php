<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingSocialMedia extends Model
{
	use SoftDeletes;
	
	protected $table = "setting_social_media";
    protected $fillable = [
	    'setting_id',
	    'icon',
	    'url',
    ];

    public function social_media_translation()
    {
        // return $this->belongsTo('App\SettingsSocialMediaTranslate','id','media_id')->where('language',LaravelLocalization::getCurrentLocale()); //if you your website is multi language activate this line to get lang from session.
        return $this->belongsTo('App\SettingsSocialMediaTranslate','id','media_id')->where('language','ar');
    }
}