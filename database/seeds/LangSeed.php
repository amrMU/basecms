<?php

use Illuminate\Database\Seeder;

class LangSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ar = App\languages::create([
        	'local'=>'ar'
        ]);
        $en = App\languages::create([
        	'local'=>'en'
        ]);

        $setting = App\Setting::create(['logo'=>'img/logo_light.png','created_by'=>1]);
        App\SettingLangs::create([
            'setting_id'=>$setting->id,
            'lang_id'=>$ar->id
        ]);
    }
}
