@extends('dashboard.layouts.main')
@section('content')
        <!-- Main content -->
        <div class="content-wrapper">
                        <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold"> @lang('home.dashboard') - @lang('home.create_testmonials')</span></h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('ar/admin/home') }}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
                        <li><a href="{{ URL::to('ar/admin/testmonials') }}"><i class="glyphicon glyphicon-heart position-left"></i> @lang('home.testmonials')</a></li>
                        <li class="active">@lang('home.create_testmonials')</li>
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
                    <div class="panel panel-flat col-md-12">
    

                        <div class="panel-heading">
                   
                        <h5 class="panel-title" > @lang('home.create_testmonials') </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="POST" action="{{ URL::to('/admin/testmonials') }}" enctype='multipart/form-data'>

                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a>{{ $error }}
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
                                    <legend class="text-bold">@lang('home.create_testmonials')</legend>
                                    @include('dashboard.testmonials.form')
                                </fieldset>
                                {{-- general Info --}}
                              
                           
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form validation -->
                
                   
            </div>
             <!-- Content area -->

        </div>
        <!-- Main content -->
@stop

@section('jsCode')
    <script>
    $('#main_category').hide();

    $('#chose_type').on('change',function(){
        if($('#chose_type').val() == 'sub'){
        $('#main_category').show();
        }else{
            $('#main_category').hide();
        }
    });

    </script>
@stop
