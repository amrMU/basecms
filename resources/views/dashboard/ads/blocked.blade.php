@extends('dashboard.layouts.main')
@section('content')

<!-- Main content -->
<div class="content-wrapper">
            <!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">@lang('home.home')</span> - @lang('home.ads') -  @lang('home.ads_list')</h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
            </div>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{URL::to(LaravelLocalization::getCurrentLocale().'/admin/home')}}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
            <li><a href="{{URL::to(LaravelLocalization::getCurrentLocale().'/admin/ads')}}"><i class="icon-statistics"></i> @lang('home.ads') </a></li>
            <li class="active">@lang('home.ads_list')</li>
        </ul>

        <ul class="breadcrumb-elements">
            <!-- <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li> -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    @lang('home.settings')
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="{{ URL::to('ar/admin/setting') }}"><i class="icon-gear"></i>@lang('home.general_settings')</a></li>
               
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /page header -->

    <!-- Content area -->
<div class="content">
        <!-- Main charts -->
        <div class="row">
        <div class="panel panel-flat ">
        <!-- table lists -->
        <div class="table-responsive">
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>@lang('home.success')!</strong> {{session('success')}}.
        </div>
        @endif
            <!--  -->
            <table class="table text-nowrap table datatable-basic" id="table">
                <thead>                  
                <tr>                                     
                    <th class="col-md-2">#</th>
                    <th class="col-md-2">@lang('home.title')</th>
                    <th class="col-md-2">@lang('home.icon')</th>
                    <th class="col-md-2">@lang('home.status')</th>
                    <th class="col-md-2">@lang('home.banned_list_messages')</th>
                    <th class="col-md-2">@lang('home.show') / @lang('home.hide')</th>
                    <th class="col-md-2">@lang('home.delete')</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                <tr>
                    <td><span class="text-semibold">{{ @$ad->id }}</span></td>
                    <td><span class="text-semibold">{{ @$ad->translations->first()->title }}</span></td>
                    <td>
                        <img src="{{url('/').'/'.@$ad->images->first()->image }}" width="50" height="50" class="img-responsive" alt="{{ @$ad->translations->first()->title }}">
                    </td>
                    <td>
                        @if(@$ad->status == 'show')
                            @lang('home.show')
                        @else
                            @lang('home.hide')
                        @endif
                   </td> 
                    <td>@include('dashboard.ads.model_banned_list')</td>
                    <td>@include('dashboard.ads.banned_from_list')</td> 
                    <td>@include('dashboard.ads.delete_from_list')</td> 

                </tr>
                @endforeach
                </tbody>
            </table>
            <!--  -->
        </div>
        <!-- table reports -->
    </div>
</div>

</div>
    <!-- Content area -->

</div>
<!-- Main content -->
@stop