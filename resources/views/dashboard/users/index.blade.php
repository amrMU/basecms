@extends('dashboard.layouts.main')
@section('content')

<!-- Main content -->
<div class="content-wrapper">
            <!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">@lang('home.home')</span> - @lang('home.wating_lists')</h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
            </div>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="{{URL::to('ar/admin/home')}}"><i class="icon-home2 position-left"></i> @lang('home.home')</a></li>
            <li class="active">@lang('home.users')</li>
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
               
                <li><a href="{{ URL::to('ar/admin/users_export') }}"><i class="icon-database-export"></i>@lang('home.export_exel_sheet')</a></li>
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
     {{--    @include('dashboard.users.search_form') --}}
        <div class="table-responsive">
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>@lang('home.success')!</strong> {{session('success')}}.
        </div>
        @endif
        <form action="{{ URL::to('/ar/admin/users_delete_all') }}" method="post">
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
                    <th class="col-md-2">@lang('home.name')</th>
                    <th class="col-md-2">@lang('home.email')</th>
                    <th class="col-md-2">@lang('home.city')</th>
                    <th class="col-md-2">@lang('home.phone')</th>
                    <th class="col-md-2">@lang('home.type')</th>
                    <th class="col-md-2">@lang('home.edit')</th>
                    <th class="col-md-2">@lang('home.delete')</th>
                    
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td><span class="text-semibold">
                            {{ @$user->id }}
                    <input type="checkbox" name="ids[]" value="{{ @$user->id }}"> 
                            
                    </span></td>
                    <td><span class="text-semibold">{{ @$user->fname.' '.$user->lname }}</span></td>
                    <td><span class="text-muted">{{ @$user->email }}</span></td>
                    <td><h6 class="text-semibold">{{ @$user->city->$name }}</h6></td>
                    <td><h6 class="text-semibold">{{ @$user->phone }}</h6></td>
                    <td><h6 class="text-semibold">{{ @$user->gander }}</h6></td>
                    <td>
                    <a href="{{URL::to('ar/admin/users/').'/'.$user->id.'/edit'}}" class="btn btn-warning "> 
                    <li class="icon-pencil5"></li>
                    </a>
                    </td>
                    <td>
                    @include('dashboard.users.delete_from_list')
                    </td> 
                </tr>
                @endforeach
                </tbody>
            </table>
            </form>
            <div style="padding:0 22%; margin-bottom: 24px;" class="center-block">
            {{@$users->links()}}
            </div>

        </div>
        <!-- table reports -->
    </div>
</div>

</div>
    <!-- Content area -->

</div>
<!-- Main content -->
@stop