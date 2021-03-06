<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Setting,App\City,App\Aboutus,App\TestMonials;
use App\Category,App\Languages,App\SettingLangs;
use App\Pages,App\ContctUs;
use App;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::booted(function()
        {
            if (\Schema::hasTable('settings')) {
                $setting = Setting::with('social_media_link')
                // ->groupby('')->distinct()
                ->first();
                // dd($setting);
                Config::set('app.name',@$setting->translation->title);
                Config::set('mail.driver',@$setting->mail_provider_info->MAIL_DRIVER);
                Config::set('mail.host',@$setting->mail_provider_info->MAIL_HOST);
                Config::set('mail.port',@$setting->mail_provider_info->MAIL_port);
                Config::set('mail.username',@$setting->mail_provider_info->MAIL_USERNAME);
                Config::set('mail.password',@$setting->mail_provider_info->MAIL_PASSWORD);
                view()->share('setting', $setting);
            }
            if(\Schema::hasTable('cities')){
                $cities = City::all();
                view()->share('cities', $cities);
            }

            if(\Schema::hasTable('pages')){
                $pages = Pages::where('status','show')->get();
                $policy = Pages::where('status','show')->where('url','policy')->first();
                view()->share('pages', $pages);
                view()->share('policy', $policy);
            }

            if(\Schema::hasTable('test_monials')){
                $testmonials = TestMonials::all();
                view()->share('testmonials', $testmonials);
            }
            
            if (\Schema::hasTable('aboutus')) {
                $info = Aboutus::first();
                view()->share('info', $info);
            }

            if (\Schema::hasTable('contctus')) {
                $contact = ContctUs::where('read','0')->get();
                view()->share('contact', $contact);
            }

            if (\Schema::hasTable('categories')) {
                $categories = Category::where('parent_id',NULL)->take(4)->get();
                $categories_has_ads = Category::whereHas('ads')->with('ads','ads.images')->get();
                view()->share('categories', $categories);
                view()->share('categories_has_ads', $categories_has_ads);
            }

            if (\Schema::hasTable('languages')) {
                $languages = Languages::all();
                view()->share('languages', $languages);
            }

            if (\Schema::hasTable('setting_langs')) {
                $site_langs = SettingLangs::all();
                view()->share('site_langs', $site_langs);
            }
           
            
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Schema::defaultStringLength(191);
    }
}
