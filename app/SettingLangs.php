<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingLangs extends Model
{
    protected $table= "setting_langs";
    protected $fillable = [
    		'setting_id',
			'lang_id',
    ];

    public function info()
    {
    	return $this->belongsTo('App\Languages','lang_id');
    }
}
