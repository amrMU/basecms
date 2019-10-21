@if($site_langs->count() > 0)
@foreach($site_langs as $lang)

    <input type="hidden" name="lang[]" value="{{ @$lang->id }}">
    <!-- title ar input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.name_'.@$lang->info->local) <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9">
           
            <input type="text" name="name[]" class="form-control" placeholder="@lang('home.name_'.@$lang->info->local)" value="@if($info){{@$info->translations->where('lang_id',$lang->id)->first()->name}}@endif">
        </div>
    </div>
    <!-- /title ar input -->
@endforeach
@endif


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
        <label class="control-label col-lg-3">@lang('home.icon') <span class="text-danger" title="@lang('home.required')"> *</span></label>
        <div class="col-lg-9">
            <input type="file" name="icon" class="file-styled" >
        </div>
    </div>
    <!-- /Logo uploader -->