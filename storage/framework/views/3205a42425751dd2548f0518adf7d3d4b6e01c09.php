<!DOCTYPE html>
<?php if(LaravelLocalization::getCurrentLocale() == 'en'): ?>
<html lang="en" dir="ltr">
<?php else: ?>
<html lang="en" dir="rtl">
<?php endif; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e(@$setting->translation->title); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset('/front/images/favicon.png')); ?>" />

    <?php echo $__env->make('dashboard.layouts.meta_tags_social', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
   
    <link href="<?php echo e(asset('/')); ?>assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/')); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/')); ?>assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/')); ?>assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('/')); ?>assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    
   	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/tables/datatables/datatables.min.js"></script>
    
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/forms/styling/uniform.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
    
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/forms/tags/tokenfield.min.js"></script>
    <script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/ui/prism.min.js"></script>
    
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>

    <script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/core/app.js"></script>

	
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/pages/form_tags_input.js"></script>

	<script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->
    
    <?php if(LaravelLocalization::getCurrentLocale() == 'ar'): ?>
    <link href="<?php echo e(asset('/')); ?>fonts/Droid.Arabic.Kufi.ttf" rel="stylesheet" type="application/octet-stream">
    <style>
        body.* {
            font-family: 'Droid.Arabic.Kufi','DroidArabicKufi';
            background-color: #FCFCFC;
            overflow: hidden;
        }
    </style> 
    <?php else: ?>
        <style>
            .panel-title{
                float:right
            }
        </style>
    <?php endif; ?>
            
</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <?php if(isset($setting)): ?>
        <a class="navbar-brand" href="<?php echo e(URL::to('ar/admin/home')); ?>"><img src="<?php echo e(url('/').'/'.@$setting->logo); ?>"  class="img-responsive"></a>
        <?php else: ?>
        <a class="navbar-brand" href="<?php echo e(URL::to('ar/admin/home')); ?>"><img src="<?php echo e(asset('/')); ?>/assets/images/logo_light.png" class="img-responsive"></a>

        <?php endif; ?>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

           
        </ul>

        <div class="navbar-right">
         
            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>
            <ul class="nav navbar-nav">
         

            </ul>
        </div>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default">
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user-material">
                    <div class="category-content">
                        <div class="sidebar-user-material-content">
                            <a href="#"><img src="<?php echo e(asset('/').Auth::user()->image); ?>" class="img-circle img-responsive" alt=""></a>
                            <h6><?php echo e(@Auth::user()->fname.' '.@Auth::user()->lname); ?></h6>
                            <span class="text-size-small"><?php echo e(@Auth::user()->address); ?></span>
                        </div>

                        <div class="sidebar-user-material-menu">
                            <a href="#user-nav" data-toggle="collapse"><span><?php echo app('translator')->getFromJson('home.myaccount'); ?></span> <i class="caret"></i></a>
                        </div>
                    </div>

                    <div class="navigation-wrapper collapse" id="user-nav">
                        <ul class="navigation">
                            <!-- <li><a href="#"><i class="icon-user-plus"></i> <span><?php echo app('translator')->getFromJson('home.profile_setting'); ?></span></a></li> -->
                            <!-- <li class="divider"></li> -->
                            <li><a href="<?php echo e(URL::to('ar/admin/setting')); ?>"><i class="icon-cog5"></i> <span><?php echo app('translator')->getFromJson('home.general_settings'); ?></span></a></li>
                            <li><a href="<?php echo e(URL::to('/logout')); ?>"><i class="icon-switch2"></i> <span><?php echo app('translator')->getFromJson('home.logout'); ?></span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <!-- <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li> -->
                            <li class="active "><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home4"></i> <span><?php echo app('translator')->getFromJson('home.dashboard'); ?></span></a></li>
                          
                            <li>
                                <a href="<?php echo e(URL::to('/')); ?>" target="_blank"><i class="icon-stack2"></i> <span><?php echo app('translator')->getFromJson('home.site'); ?></span></a>
                               
                            </li>
                            <li class="">
									<a href="#" class="has-ul legitRipple"><i class="icon-users4"></i> <span><?php echo app('translator')->getFromJson('home.users'); ?></span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
									<ul class="hidden-ul" style="display: none;">
                                        <li><a href="<?php echo e(URL::to('ar/admin/users')); ?>" class=""><?php echo app('translator')->getFromJson('home.users_list'); ?></a></li>
                                        <li><a href="<?php echo e(URL::to('ar/admin/users/create')); ?>" class=""><?php echo app('translator')->getFromJson('home.create_users'); ?></a></li>
									</ul>
                            </li>
                            <li class="">
									<a href="#" class="has-ul "><i class="icon-archive"></i> <span><?php echo app('translator')->getFromJson('home.categories'); ?></span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
									<ul class="hidden-ul" style="display: none;">
                                        <li><a href="<?php echo e(URL::to('ar/admin/categories')); ?>" class=""><?php echo app('translator')->getFromJson('home.categories_list'); ?></a></li>
                                        <li><a href="<?php echo e(URL::to('ar/admin/categories/create')); ?>" class=""><?php echo app('translator')->getFromJson('home.create_categories'); ?></a></li>
									</ul>
                            </li>
                            <li class="">
                                    <a href="#" class="has-ul "><i class="icon-newspaper"></i> <span><?php echo app('translator')->getFromJson('home.pages_list'); ?></span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                                        <li><a href="<?php echo e(URL::to('ar/admin/pages')); ?>" class=""><?php echo app('translator')->getFromJson('home.pages_list'); ?></a></li>
                                        <li><a href="<?php echo e(URL::to('ar/admin/pages/create')); ?>" class=""><?php echo app('translator')->getFromJson('home.create_page'); ?></a></li>
                                    </ul>
                            </li>
                            <li class="">
                                    <a href="#" class="has-ul "><i class="icon-newspaper"></i> <span><?php echo app('translator')->getFromJson('home.about_us'); ?></span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                              
                                        <li><a href="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'/admin/aboutus')); ?>" class=""><?php echo app('translator')->getFromJson('home.about_us'); ?></a></li>
                                    </ul>
                            </li>
                            <li class="">
                                    <a href="#" class="has-ul "><i class="icon-statistics"></i> <span><?php echo app('translator')->getFromJson('home.ads'); ?></span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                              
                                        <li><a href="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'/admin/ads')); ?>" class=""><?php echo app('translator')->getFromJson('home.ads_list'); ?></a></li>
                                        <li><a href="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'/admin/banned_ads')); ?>" class=""><?php echo app('translator')->getFromJson('home.ads_list_blocked'); ?></a></li>
                                        <li><a href="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'/admin/ads/create')); ?>" class=""><?php echo app('translator')->getFromJson('home.create_ad'); ?></a></li>
                                    </ul>
                            </li>  
                            <li class="">
                                    <a href="#" class="has-ul "><i class="glyphicon glyphicon-heart"></i> <span><?php echo app('translator')->getFromJson('home.testmonials'); ?></span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                              
                                        <li><a href="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'/admin/testmonials')); ?>" class=""><?php echo app('translator')->getFromJson('home.testmonials_list'); ?></a></li>
                                        <li><a href="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'/admin/testmonials/create')); ?>" class=""><?php echo app('translator')->getFromJson('home.create_testmonials'); ?></a></li>
                                    </ul>
                            </li>  
                            <li class="">
                                    <a href="#" class="has-ul ">
                                        <i class="icon-bell3 position-left"></i>
                                    
                                    <span><?php echo app('translator')->getFromJson('home.contactus'); ?> <?php if($contact->count() > 0 ): ?><small class="badge badge-primary"><?php echo e(@$contact->count()); ?></small><?php endif; ?></span>
                                    <span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;">
                                    </span>
                                </a>
                                    <ul class="hidden-ul" style="display: none;">
                              
                                        <li><a href="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'/admin/contactus')); ?>" class=""><?php echo app('translator')->getFromJson('home.contactus_list'); ?></a></li>
                                    </ul>
                            </li>                        
                            
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->

    <?php echo $__env->yieldContent('content'); ?>
    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
<?php echo $__env->yieldContent('jsCode'); ?>
</body>
</html>
