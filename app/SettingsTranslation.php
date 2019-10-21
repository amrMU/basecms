<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsTranslation extends Model
{
    protected $table = "settings_translations";
    protected $fillable = [
    		'title',
			'content',
			'lang_id',
			'setting_id',
    ];

    public function lang()
    {
    	return $this->belongsTo('App\Languages','lang_id');
    }
}
