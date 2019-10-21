@if($site_langs->count() > 0)
@foreach($site_langs as $key => $lang)

    <input type="hidden" name="lang[]" value="{{ @$lang->id }}">

    <!-- title ar input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.title_'.@$lang->info->local) <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9">
            <input type="text" name="title[]" class="form-control" placeholder="@lang('home.title_'.@$lang->info->local)" value="{{@$info->translations->where('lang_id',$lang->id)->first()->title}}">
        </div>
    </div>
    <!-- /title ar input -->
    {{-- content ar --}}
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.content_'.@$lang->info->local) <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9">
           <textarea name="content[]" id="editor{{ @$key }}" rows="4" cols="4"  placeholder="@lang('home.content_'.@$lang->info->local)">{{ @$info->translations->where('lang_id',$lang->id)->first()->content }}</textarea>
       </div>
   </div>
   {{-- content ar --}}
@endforeach 
@endif

   <!-- url input -->
   <div class="form-group">
    <label class="control-label col-lg-3">@lang('home.url_page') <span class="text-danger" title="@lang('home.required')">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="url" class="form-control"  placeholder="@lang('home.url_page')" value="{{@$info->url}}">
    </div>
</div>
<!-- /url input -->
<!-- Meta Tags input -->
<div class="form-group">
    <label class="control-label col-lg-3">@lang('home.meta_tags') <span class="text-danger" title="@lang('home.required')">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="meta_tags" class="form-control tokenfield" value="@lang('home.placeholder_metatags')" value="{{@$info->meta_tags}}">
    </div>
</div>
<!-- /Meta Tags input -->

{{-- Show page --}}
<div class="form-group">
    <label class="control-label col-lg-3">@lang('home.status')</label>
    <div class="col-lg-4">
        <div class="checkbox checkbox-switch">
            <input type="radio" name="status" class="switch" value="show" @if(@$info->status  == 'show') checked="checked"  @endif>
            <label>
               @lang('home.show')
           </label>
       </div>
   </div>
   <div class="col-lg-4">
    <div class="checkbox checkbox-switch">
        <input type="radio" name="status" class="switch" value="hide" @if(@$info->status  == 'hide') checked="checked" @endif >
        <label>
            @lang('home.hide')
        </label>
    </div>
</div>
</div>
{{--Show page --}}

<!-- Logo uploader -->
<div class="form-group">
    <label class="control-label col-lg-3">@lang('home.icon') <span class="text-danger" title="@lang('home.required')"> *</span></label>
    <div class="col-lg-9">
        <input type="file" name="icon" class="file-styled" >
    </div>
</div>
<!-- /Logo uploader -->
