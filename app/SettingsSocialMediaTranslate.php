<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsSocialMediaTranslate extends Model
{
	protected $table= 'settings_social_media_translates';
    protected $fillable = [
				'setting_id',
				'media_id',
				'language',
				'name',
				    ];
}
