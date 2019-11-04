<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


	Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
	],
	function()
	{
		Route::get('/','Front\CoomingSoonController@index');
		Route::post('user/waiting','Front\WatingListController@setInList');


	Route::group(['middleware' => 'auth'], function () {
	Route::group(['middleware' => 'admin'], function () {

		Route::group(['prefix' => '/admin'], function () {
		
			Route::get('setting','Admin\SettingController@create');
			Route::post('setting','Admin\SettingController@store');

			Route::get('home','Admin\HomeController@index');
			Route::get('reports_browsing','Admin\ReportsController@GetBrowsingInfo');
			Route::get('reports_browsing/{id}/u/{user_name}','Admin\ReportsController@getUserBrowseInfo');
			Route::get('reports_browsing/{id}/delete','Admin\ReportsController@delete_reports');

			Route::get('file/{id}/delete','Admin\SettingController@delete_external_file');

			Route::get('wating_lists','Admin\WatingListController@index');
			Route::get('wating_list/search','Admin\WatingListController@saarch');
			Route::get('wating_lists/export','Admin\WatingListController@ExportExelSheet');
			Route::get('wating_lists/{id}/delete','Admin\WatingListController@destroy');

			Route::resource('users','Admin\UsersController');
			Route::get('users_export','Admin\UsersController@ExportExelSheet');
			Route::get('users/{id}/delete','Admin\UsersController@destroy');

			Route::resource('categories','Admin\CategoriesController');
			Route::get('categories/{id}/delete','Admin\CategoriesController@destroy');
			Route::get('categories_export','Admin\CategoriesController@ExportExelSheet');

			Route::resource('testmonials','Admin\TestmonialsController');
			Route::get('testmonials/{id}/delete','Admin\TestmonialsController@destroy');
			Route::DELETE('testmonials_delete_all','Admin\TestmonialsController@destroyAll');
			Route::get('testmonials_export','Admin\TestmonialsController@ExportExelSheet');

			Route::resource('pages','Admin\PagesController');
			Route::get('pages/{id}/delete','Admin\PagesController@destroy');

			Route::resource('ads','Admin\AdsController');
			Route::get('banned_ads','Admin\AdsController@bannedAds');
			Route::get('banned_ads/{ad_id}/{status}','Admin\AdsController@banneAdd');
			Route::get('ads/{id}/image/delete','Admin\AdsController@DestroyImage');
			Route::get('ads/{id}/delete','Admin\AdsController@destroy');

			Route::get('aboutus','Admin\AboutusController@create');
			Route::post('aboutus','Admin\AboutusController@save');

			Route::resource('blogs','Admin\BlogsController');
			Route::get('blogs/{id}/delete','Admin\BlogsController@destroy');
			Route::get('blogs_search','Admin\BlogsController@search');			
			Route::get('blogs_export','Admin\BlogsController@ExportExelSheet');

			Route::get('contactus','Admin\ContactUsController@list');
			Route::get('contactus/{id}/delete','Admin\ContactUsController@destroy');
			Route::DELETE('contactus_delete_all','Admin\ContactUsController@destroyAll');


			Route::get('sitemap/create','Admin\SitemapGeneratorController@create');
			Route::post('sitemap','Admin\SitemapGeneratorController@store');
		});


	});
	});
		Route::get('logout','Auth\LoginController@logout');
	});

	//site routes 
	Route::group(['middleware' => 'auth'], function () {
		Route::get('i/advertising/create','Front\AdsController@create');
		Route::post('i/advertising','Front\AdsController@store');
		Route::put('i/advertising/{id}','Front\AdsController@update');
		
		Route::get('i/profile','Auth\ProfileController@getProfile');
		
		Route::post('i/update_profile','Auth\ProfileController@PutUpdate');

		Route::get('i/ads/{id}/delete','Front\AdsController@destroy');
		Route::get('i/ads/{id}/edit','Front\AdsController@edit');
		Route::get('i/ads/{id}/image/delete','Front\AdsController@DestroyImage');
		
		Route::get('i/fav/{ad_id}/{user_id}','Api\FavAdsController@fav');
		route::post('/do/rate/{ad_id}','Front\RateController@doRate');
		Route::post('ad/block/{ad_id}','Front\BlockAdsController@doReport');

	});
	Route::get('categories/{id}/{name}','Front\CategoriesController@show');
	Route::get('aboutus','Front\AboutUsController@show');
	Route::get('pages/{id}/{title}','Front\PagesController@getPage');	
	Route::get('contactus','Front\ContctUsController@getSendAsk');
	Route::post('contactus','Front\ContctUsController@posttSendAsk');
	Route::get('/ads/{id}/{name}','Front\AdsController@show');
	Route::get('/','Front\HomeController@index');
	Route::get('/search/{category_id}','Front\SearchController@search');



Route::get('/admin','Auth\CustomAuthController@adminLogin');
Route::get('/register','Auth\CustomAuthController@Getsignup');

Auth::routes();
