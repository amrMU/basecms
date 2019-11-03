

@if($ad->status == "show")
<a href="{{ URL::to('/admin/banned_ads').'/'.@$ad->id.'/hide' }}" title="@lang('home.hide')" class="btn btn-warning"><li class="icon-eye-blocked"></li></a>
@else 

<a href="{{ URL::to('/admin/banned_ads').'/'.@$ad->id.'/show' }}" title="@lang('home.show')" class="btn btn-warning"><li class="icon-eye"></li></a>
@endif