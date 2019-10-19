## Limet Less - RTL

Slim It's a Awesome Dashboard Has Most Component To Use In Your Application .. Modern & Clean Responsive Bootstrap 3.3.5 Admin Dashboard Template .. I'm using the bright color version

## Why Build It?
All Mobile Applications & Web Application Have Standard Or Base Informations .. I've Collected Data Shared In All This And Built It.

## components:

##Site

..* Comming Soon InterFace with Ar, En Languages  to receiving subscription user info

##Control Panel
 namespace App\Http\Controllers\Admin
#Languge support Ar, En

..* Track all panel user what are you doing boot and save it to check all after if i have rule.

..* receiving subscription user info List with remove one or Export All as ExelSheet.

..* Authentication Model (Login - Logout - Forget password - Reset password).

..* Software Setting (general settings - SMTP BUILDER - DEPARTMENT EMAILS - COMPANY ADDRESSES - PHONES - WHATSAPP 				NUMBERS - SOCIAL MEDIA LINKS GENERATOR).
	#Setting Cmoponents for update or add new :
	1.Main Controller contain main jobs name is SettingController [create,store]
	2.sub Controller contain all settings components name is SettingProgressController [create first time OR update all time  ] contain components [
			setTranslation(main translation in setting table),	
			external_resources,
			store_mail_provider,
			store_email,
			store_phonesstore_whatsapp, 
			store_address,
			store_social_media_chanels
	] (you can use this components in create or update both)

..* Users CRUD to add anyuser if wnat, support export it out.

..* Categories CRUD => Main attrebute is['meta_tags','parent_id','icon'] current content lang ar for add new one 						lang add input hidden name is lang[] value for exapmple en with input content name like 						  content[] as array i will recive in controller as array in translation table.
	
	#for getting data translation from DB find in model function translation and replace ->where('language','ar') to ->where('language',LaravelLocalization::getCurrentLocale())

..* Pages CRUD => Main attrebute is['url', 'meta_tags','icon','status'] current content lang ar for add new one 				lang add input hidden name is lang[] value for exapmple en with input content name like content[] 					as array i will recive in controller as array in translation table.
	
	#for getting data translation from DB find in model function translation and replace ->where('language','ar') to ->where('language',LaravelLocalization::getCurrentLocale())

..* Blogs CRUD .


#after git clone dont forget follow this steps

  1. run commend : sudo chmod -R 777 bootstrap/cache
  2. run commend : sudo chmod -R 777 storage
  3. run commend : sudo chmod -R 777 public/uploads
  4. create database Name is "base_custom" or create database as you like and open main directory on project then .env file to set database name connection(DB_DATABASE,DB_USERNAME,DB_PASSWORD)
 defualt is a [
		  'DB_DATABASE'=>'base_project' ,
		  'DB_USERNAME'=>'root',
		  'DB_PASSWORD'= ''
  ]
 5. Run commend : php artisan migrate --seed

### can access dashboard using progict url/login try to use it and make a code review as you like  
