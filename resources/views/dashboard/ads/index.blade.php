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
        <form action="{{ URL::to('/ar/admin/ads_delete_all') }}" method="post">
        @csrf
        <input name="_method" type="hidden" value="DELETE">
             <div class="row" style="margin:5px;">
                <div class="col-md-2">
                    <button type="button" class="btn btn-info"  >
                    <input type="checkbox" id="select-all">  
                    @lang('home.sellect_all')</button>
                </div>
                <div class="col-md-2">
                    
                    <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#DeleteSelected">
                       @lang('home.delete_all')
                    </button>


                    <!-- Modal -->
                    <div id="DeleteSelected" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">@lang('home.header_delete_model')</h4>
                        </div>
                        <div class="modal-body">
                            <p>@lang('home.body_delete_all_model')</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('home.close')</button>
                          
                            <button type="submit"  class="btn btn-danger" >@lang('home.delete_all')</button>    


                        </div>
                    </div>

                </div>
            </div>

                </div>
            </div>
            <!--  -->
            <table class="table text-nowrap table datatable-basic" id="table">
                <thead>                  
                <tr>                                     
                    <th class="col-md-2">#</th>
                    <th class="col-md-2">@lang('home.title')</th>
                    <th class="col-md-2">@lang('home.icon')</th>
                    <th class="col-md-2">@lang('home.status')</th>
                    <th class="col-md-2">@lang('home.edit')</th>
                    <th class="col-md-2">@lang('home.delete')</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                <tr>
                    <td><span class="text-semibold">
                            {{ @$ad->id }}
                    <input type="checkbox" name="ids[]" value="{{ @$ad->id }}"> 

                    </span></td>
                    <td><span class="text-semibold">{{ @$ad->translations->first()->title }}</span></td>
                    <td>
                        @if($ad->images->count() > 0 )
                           <img src="{{url('/').'/'.@$ad->images->first()->image }}"  width="50" height="50" class="img-responsive" alt="{{ @$ad->translations->first()->title }}">
                        @else 
                           <img src="{{ asset('/img/no_image.png')}}"  width="50" height="50" class="img-responsive" alt="{{ @$ad->translations->first()->title }}">
                        @endif
                    </td>
                    <td>
                        @if(@$ad->status == 'show')
                            @lang('home.show')
                        @else
                            @lang('home.hide')
                        @endif
                       

                    </td> 
                    <td>
                        <a href="{{URL::to('ar/admin/ads/').'/'.$ad->id.'/edit'}}" class="btn btn-warning "><li class="icon-pencil5"></li></a>
                    </td>
                   
                    <td>@include('dashboard.ads.delete_from_list')</td> 
                </tr>
                @endforeach
                </tbody>
            </table>
        </form>
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
@section('jsCode')
    <script>
        // Listen for click on toggle checkbox
        $('#select-all').click(function(event) {   
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;                       
                });
            }
        });
    </script>
@stop