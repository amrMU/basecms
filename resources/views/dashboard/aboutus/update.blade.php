@extends('dashboard.layouts.main')
@section('style')
    <script type="text/javascript" src="{{ asset('/') }}assets/js/pages/dashboard.js"></script>
@stop
@section('content')
        <!-- Main content -->
        <div class="content-wrapper">
                        <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-right6 position-left"></i>  @lang('home.dashboard')  - @lang('home.about_us') - <span class="text-semibold">@lang('home.update')</span> </h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('ar/admin/home') }}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
                        <li class="">@lang('home.about_us')</li>
                        <li class="active">@lang('home.update') </li>
                    </ul>

                    <ul class="breadcrumb-elements">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear position-left"></i>
                                @lang('home.settings')
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                              <li><a href="{{ URL::to('ar/admin/setting') }}"><i class="icon-gear"></i>@lang('home.settings')</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

             <!-- Content area -->
            <div class="content">
                <!-- Form validation -->
                    <div class="panel panel-flat col-md-10">
    

                        <div class="panel-heading">
                   
                        <h5 class="panel-title" > @lang('home.update') </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="POST" action="{{ URL::to(LaravelLocalization::getCurrentLocale().'/admin/aboutus') }}" enctype='multipart/form-data'>
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a>{{@$error }}
                                </div>
                                @endforeach
                                @endif
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a>{{ Session::get('success') }}
                                </div>
                                @endif
                                @csrf
                                {{-- general Info --}}
                                <fieldset class="content-group">
                                    <legend class="text-bold">@lang('home.update_info')</legend>
                                    <input type="hidden" name="lang[]" value="ar">
                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.title_ar') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title[]" class="form-control" placeholder="@lang('home.title_ar')" value="{{ @$info->translation->title }}">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->
                                    {{-- mission ar --}}
                                     <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.content_ar') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                             <textarea name="content[]" id="editor3" rows="4" cols="4"  placeholder="@lang('home.content_ar')">{{ @$info->translation->content }}</textarea>
                                        </div>
                                    </div>
                                    {{-- mission ar --}} 
                                    {{-- mission ar --}}
                                     <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.mission_ar') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                             <textarea name="mission[]" id="editor1" rows="4" cols="4"  placeholder="@lang('home.mission_ar')">{{ @$info->translation->mission }}</textarea>
                                        </div>
                                    </div>
                                    {{-- mission ar --}} 

                                     {{-- mission ar --}}
                                     <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.goals_ar') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                             <textarea name="goals[]" id="editor2" rows="4" cols="4"  placeholder="@lang('home.goals_ar')">{{ @$info->translation->goals }}</textarea>
                                        </div>
                                    </div>
                                    {{-- mission ar --}} 

                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.url_page') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="url" class="form-control"  placeholder="@lang('home.url_page')" value="{{@@$info->url}}">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->
                                    <!-- Meta Tags input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.meta_tags') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="meta_tags" class="form-control tokenfield" value="@lang('home.placeholder_metatags')" value="{{@$info->meta_tags}}">
                                        </div>
                                    </div>
                                    <!-- /Meta Tags input -->
                                                                        
                                    <!-- Logo uploader -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.image') <span class="text-danger" title="@lang('home.required')"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="file" name="image" class="file-styled" >
                                        </div>
                                    </div>
                                    <!-- /Logo uploader -->
                                 
                                </fieldset>
                                {{-- general Info --}}
                              
                           
                                <div class="text-right">
                                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <img src="{{url('/').@$info->image}}" class="img-responsive" style="max-width:100%" >
                    </div>
                    <!-- /form validation -->
                
                   
            </div>
             <!-- Content area -->

        </div>
        <!-- Main content -->
@stop

@section('jsCode')
    <script type="text/javascript">
          // Full featured editor
        CKEDITOR.replace( 'editor1',{
            extraPlugins: 'forms'
        });
        CKEDITOR.replace( 'editor2',{
            extraPlugins: 'forms'
        });
        CKEDITOR.replace( 'editor3',{
            extraPlugins: 'forms'
        });
            CKEDITOR.config.extraPlugins = 'justify';

    </script>
@stop