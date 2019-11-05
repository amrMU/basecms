<!DOCTYPE html>
@if(LaravelLocalization::getCurrentLocale() == 'en')
<html lang="en" dir="ltr">
@else
<html lang="en" dir="rtl">
@endif
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{@$setting->translation->title}}</title>
    <link rel="shortcut icon" href="{{asset('/front/images/favicon.png')}}" />

    @include('dashboard.layouts.meta_tags_social')
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
   
    <link href="{{ asset('/') }}assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('/') }}assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('/') }}assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('/') }}assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('/') }}assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    
   	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/forms/tags/tagsinput.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/tables/datatables/datatables.min.js"></script>
    
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/forms/styling/uniform.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
    
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/forms/tags/tokenfield.min.js"></script>
    <script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/ui/prism.min.js"></script>
    
	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/forms/inputs/typeahead/typeahead.bundle.min.js"></script>

    <script type="text/javascript" src="{{ asset('/') }}assets/js/core/app.js"></script>

	{{-- <script type="text/javascript" src="{{ asset('/') }}assets/js/pages/dashboard.js"></script> --}}
	<script type="text/javascript" src="{{ asset('/') }}assets/js/pages/datatables_basic.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}assets/js/pages/form_tags_input.js"></script>

	<script type="text/javascript" src="{{ asset('/') }}assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->
    
    @if(LaravelLocalization::getCurrentLocale() == 'ar')
    <link href="{{ asset('/') }}fonts/Droid.Arabic.Kufi.ttf" rel="stylesheet" type="application/octet-stream">
    <style>
        body.* {
            font-family: 'Droid.Arabic.Kufi','DroidArabicKufi';
            background-color: #FCFCFC;
            overflow: hidden;
        }
    </style> 
    @else
        <style>
            .panel-title{
                float:right
            }
        </style>
    @endif
            
</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        @if(isset($setting))
        <a class="navbar-brand" href="{{URL::to('ar/admin/home')}}"><img src="{{url('/').'/'.@$setting->logo}}"  class="img-responsive"></a>
        @else
        <a class="navbar-brand" href="{{URL::to('ar/admin/home')}}"><img src="{{ asset('/') }}/assets/images/logo_light.png" class="img-responsive"></a>

        @endif
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
                            <a href="#"><img src="{{ asset('/').Auth::user()->image }}" class="img-circle img-responsive" alt=""></a>
                            <h6>{{@Auth::user()->fname.' '.@Auth::user()->lname}}</h6>
                            <span class="text-size-small">{{@Auth::user()->address}}</span>
                        </div>

                        <div class="sidebar-user-material-menu">
                            <a href="#user-nav" data-toggle="collapse"><span>@lang('home.myaccount')</span> <i class="caret"></i></a>
                        </div>
                    </div>

                    <div class="navigation-wrapper collapse" id="user-nav">
                        <ul class="navigation">
                            <!-- <li><a href="#"><i class="icon-user-plus"></i> <span>@lang('home.profile_setting')</span></a></li> -->
                            <!-- <li class="divider"></li> -->
                            <li><a href="{{ URL::to('ar/admin/setting') }}"><i class="icon-cog5"></i> <span>@lang('home.general_settings')</span></a></li>
                            <li><a href="{{ URL::to('/logout') }}"><i class="icon-switch2"></i> <span>@lang('home.logout')</span></a></li>
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
                            <li class="active "><a href="{{ URL::to('ar/admin/home') }}"><i class="icon-home4"></i> <span>@lang('home.dashboard')</span></a></li>
                          {{--   <li>
                                <a href="{{ URL::to('ar/admin/wating_lists') }}"><i class="icon-stack2"></i> <span>@lang('home.wating_lists')</span></a>
                               
                            </li> --}}
                            <li>
                                <a href="{{ URL::to('/') }}" target="_blank"><i class="icon-stack2"></i> <span>@lang('home.site')</span></a>
                               
                            </li>
                            <li class="">
									<a href="#" class="has-ul legitRipple"><i class="icon-users4"></i> <span>@lang('home.users')</span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
									<ul class="hidden-ul" style="display: none;">
                                        <li><a href="{{ URL::to('ar/admin/users') }}" class="">@lang('home.users_list')</a></li>
                                        <li><a href="{{ URL::to('ar/admin/users/create') }}" class="">@lang('home.create_users')</a></li>
									</ul>
                            </li>
                            <li class="">
									<a href="#" class="has-ul "><i class="icon-archive"></i> <span>@lang('home.categories')</span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
									<ul class="hidden-ul" style="display: none;">
                                        <li><a href="{{ URL::to('ar/admin/categories') }}" class="">@lang('home.categories_list')</a></li>
                                        <li><a href="{{ URL::to('ar/admin/categories/create') }}" class="">@lang('home.create_categories')</a></li>
									</ul>
                            </li>
                            <li class="">
                                    <a href="#" class="has-ul "><i class="icon-newspaper"></i> <span>@lang('home.pages_list')</span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                                        <li><a href="{{ URL::to('ar/admin/pages') }}" class="">@lang('home.pages_list')</a></li>
                                        <li><a href="{{ URL::to('ar/admin/pages/create') }}" class="">@lang('home.create_page')</a></li>
                                    </ul>
                            </li>
                            <li class="">
                                    <a href="#" class="has-ul "><i class="icon-newspaper"></i> <span>@lang('home.about_us')</span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                              
                                        <li><a href="{{ URL::to(LaravelLocalization::getCurrentLocale().'/admin/aboutus') }}" class="">@lang('home.about_us')</a></li>
                                    </ul>
                            </li>
                            <li class="">
                                    <a href="#" class="has-ul "><i class="icon-statistics"></i> <span>@lang('home.ads')</span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                              
                                        <li><a href="{{ URL::to(LaravelLocalization::getCurrentLocale().'/admin/ads') }}" class="">@lang('home.ads_list')</a></li>
                                        <li><a href="{{ URL::to(LaravelLocalization::getCurrentLocale().'/admin/banned_ads') }}" class="">@lang('home.ads_list_blocked')</a></li>
                                        <li><a href="{{ URL::to(LaravelLocalization::getCurrentLocale().'/admin/ads/create') }}" class="">@lang('home.create_ad')</a></li>
                                    </ul>
                            </li>  
                            <li class="">
                                    <a href="#" class="has-ul "><i class="glyphicon glyphicon-heart"></i> <span>@lang('home.testmonials')</span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                              
                                        <li><a href="{{ URL::to(LaravelLocalization::getCurrentLocale().'/admin/testmonials') }}" class="">@lang('home.testmonials_list')</a></li>
                                        <li><a href="{{ URL::to(LaravelLocalization::getCurrentLocale().'/admin/testmonials/create') }}" class="">@lang('home.create_testmonials')</a></li>
                                    </ul>
                            </li>  
                            <li class="">
                                    <a href="#" class="has-ul ">
                                        <i class="icon-bell3 position-left"></i>
                                    
                                    <span>@lang('home.contactus') @if($contact->count() > 0 )<small class="badge badge-primary">{{ @$contact->count() }}</small>@endif</span>
                                    <span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;">
                                    </span>
                                </a>
                                    <ul class="hidden-ul" style="display: none;">
                              
                                        <li><a href="{{ URL::to(LaravelLocalization::getCurrentLocale().'/admin/contactus') }}" class="">@lang('home.contactus_list')</a></li>
                                    </ul>
                            </li>                        
                            {{--      <li class="">
                                    <a href="#" class="has-ul "><i class="icon-blog"></i> <span>@lang('home.blogs')</span><span class="" style="left: 39.2308%; top: 63.6364%; transform: translate3d(-50%, -50%, 0px); transition-duration: 0.2s, 0.5s; width: 202.844%;"></span></a>
                                    <ul class="hidden-ul" style="display: none;">
                                        <li><a href="{{ URL::to('ar/admin/blogs') }}" class="">@lang('home.blog_list')</a></li>
                                        <li><a href="{{ URL::to('ar/admin/blogs/create') }}" class="">@lang('home.create_new')</a></li>
                                    </ul>
                            </li>
                         --}}
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->

    @yield('content')
    </div>
    <!-- /page content -->

</div>
<!-- /page container -->
@yield('jsCode')
</body>
</html>
