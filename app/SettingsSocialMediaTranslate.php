<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsSocialMediaTranslate extends Model
{
	protected $table= 'settings_social_media_translates';
    protected $fillable = [
				'setting_id',
				'media_id',
				'lang_id',
				'name',
				    ];
 	public function lang()
    {
        return $this->belongsTo('App\Languages','lang_id','id');
    }
}
