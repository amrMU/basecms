<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelLocalization;
use URL;
class Setting extends Model
{
    use SoftDeletes;

    protected $table = 'settings';
    protected $fillable = [
            'logo',
            'meta_tags',
            // 'extirnal_code',
            'created_by'
    ];

    public function translation()
    {
       
        $find_lang = languages::where('local',LaravelLocalization::getCurrentLocale())->first();
        return $this->belongsTo('App\SettingsTranslation','id','setting_id')->where('lang_id',$find_lang->id);
    }

    public function translations()
    {
        return $this->hasMany('App\SettingsTranslation','setting_id','id');
        
    }
    

    public function mail_provider_info()
    {
        return $this->belongsTo('App\SettingMailProviderInfo','id','setting_id');
    }

    public function emails()
    {
        return $this->hasMany('App\SettingEmail','setting_id','id');
    }

    public function address()
    {
        return $this->hasMany('App\SettingAddress','setting_id','id');
    }

    public function phones()
    {
        return $this->hasMany('App\SettingPhone','setting_id','id');
    }

    public function whatsapp()
    {
        return $this->hasMany('App\SettingWatsapp','setting_id','id');
    }

    public function social_media_link()
    {
        return $this->hasMany('App\SettingSocialMedia','setting_id','id');
    }

   

    
    public function external_resources()
    {
        return $this->hasMany('App\ExternalResources','setting_id','id');
    }

    
}
