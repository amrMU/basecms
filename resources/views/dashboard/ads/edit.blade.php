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
                        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold"> @lang('home.dashboard') - @lang('home.ads') - @lang('home.edit_page_info')</span>  </h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="{{ URL::to('ar/admin/home') }}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
                        <li><a href="{{URL::to('ar/admin/ads')}}"><i class="icon-statistics"></i> @lang('home.ads') </a></li>
                        <li class="active">@lang('home.update_info')</li>
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
                            <h5 class="panel-title">@lang('home.update_info')</h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="post" action="{{ route('ads.update',$info) }}" enctype='multipart/form-data'  >
                            <input name="_method" type="hidden" value="PUT">
                            <input name="use" type="hidden" value="{{@$info->id}}">

                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ $error }}
                                </div>
                                @endforeach
                                @endif
                                @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('success') }}
                                </div>
                                @endif
                                @csrf
                                @include('dashboard.ads.form')
                                <div class="text-right">
                                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form validation -->
                    <div class="col-md-2">
                   

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">
                        @foreach($info->images as $key => $image)
                            <li data-target="#myCarousel" data-slide-to="{{ @$key }}" class="@if($key == 0) active @endif"></li>
                        @endforeach
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                        @foreach($info->images as $key => $image)
                       
                        <div class="item @if($key == 0) active @endif">
                          <img src="{{url('/').@$image->image}}"  class="img-responsive" style="max-width:100%" >
                          <a  href="{{ URL::to(LaravelLocalization::getCurrentLocale()).'/admin/ads/'.$image->id.'/image/delete' }}" style="position: absolute; top: 8px; right: 8px; width: 28px; height: 28px; border: 1px solid #f70606; border-radius: 50%; line-height: 28px; text-align: center; font-size: 11px; color: #f70606">
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>
                        </div>
                        @endforeach

                      </div>

                    </div>
                    {{-- <img src="{{url('/').@$image->image}}" class="img-responsive" style="max-width:100%" > --}}
                    </div>
                  
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

//script getting sub categories fillter
@if($info->category->parent_id != NULL)//show sub categories or no sub mesg condetion
$('#sub_categoris').show();
$('#sub_categoris_unknown').hide();
@else
$('#sub_categoris').hide();
$('#sub_categoris_unknown').show();
@endif//end condetion
$('#parent_id').on('change',function () {
    if ($(this).val() != '') {
        var parent_id = $(this).val();
        $.ajax({
            'url' : '{{ URL::to('/') }}/api/categories/' + parent_id,
            'type' : 'GET',
            'success' : function(data) {     
               console.log(data.data.length );
                if (data.data.length == 0) {
                    $('#sub_categoris').hide();
                    $('#sub_categoris_unknown').show();
                } //where sub categories list  length = 0
                else{//where sub categories list  length  > 0 will append in #sub_categoris

                    $('#sub_categoris').show();
                    $('#sub_categoris_unknown').hide();
                    $('#sub_categoris').empty()
                    for (var i = data.data.length - 1; i >= 0; i--) {
                        $('#sub_categoris').append("<option value='"+data.data[i].id+"'>"+data.data[i].category_translation.name+"</option")   
                    }
                }   
            }//server success case 
            ,'error' : function(request,error)
            {
                $('#sub_categoris').hide();
                $('#sub_categoris_unknown').show();
            }//server error case 
        });
    }else{
        $('#sub_categoris').hide();
        $('#sub_categoris_unknown').show();
    }
});
</script>
@stop