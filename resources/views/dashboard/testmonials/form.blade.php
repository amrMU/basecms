<!-- ads input -->
<div class="form-group">
    <label class="control-label col-lg-3">@lang('home.ads') <span class="text-danger" title="@lang('home.required')">*</span></label>
    <div class="col-lg-9">
        <select name="category_id" class="form-control">
            <option value="">@lang('home.select_one')</option>
            @foreach($categories as $category)
            <option value="{{ @$category->id }}" @if(@$category->id == @$info->category_id) selected @endif>{{ @$category->translations->first()->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<!-- ads input -->
<!-- title input -->
<div class="form-group">
    <label class="control-label col-lg-3">@lang('home.title') <span class="text-danger" title="@lang('home.required')">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="title" class="form-control" placeholder="@lang('home.title')" value="@if($info){{@$info->title}}@endif">
    </div>
</div>
<!--/title input -->
  <!-- content input -->
<div class="form-group">
    <label class="control-label col-lg-3">@lang('home.content') <span class="text-danger" title="@lang('home.required')">*</span></label>
    <div class="col-lg-9">
        <textarea name="content" class="form-control" placeholder="@lang('home.content')">@if($info){!! @$info->content !!}@endif</textarea>
    </div>
</div>
<!--/content input -->

<!-- Logo uploader -->
<div class="form-group">
    <label class="control-label col-lg-3">@lang('home.image') <span class="text-danger" title="@lang('home.required')"> *</span></label>
    <div class="col-lg-9">
        <input type="file" name="image" class="file-styled" >
    </div>
</div>
<!--/Logo uploader -->