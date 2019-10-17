<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsTranslation extends Model
{
    protected $table = "settings_translations";
    protected $fillable = [
    		'title',
			'content',
			'language',
			'setting_id',
    ];
}
