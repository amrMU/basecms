{{-- general Info --}}
<fieldset class="content-group">
    <legend class="text-bold">@lang('home.create_ad')</legend>
    <!-- categories input -->
    <div class="form-group" id="main_category">
    <label class="control-label col-lg-3">@lang('home.main_categories') <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9"> 
        <select name="category_id" id="parent_id" class="form-control" >
            <option value="">@lang('home.select_one')</option>
            @foreach($categories as $category)
            <option 
            value="{{@$category->id}}"
             @if(isset($info))
             @if($category->id == $info->category->parent_id)
              selected
               @endif
               @endif
               >
                {{@$category->category_translation->name}}
            </option>
            @endforeach
        </select>
        </div>
    </div>
    <div class="form-group" >
    <label class="control-label col-lg-3">@lang('home.sub_categories') <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9"> 
         <div class="alert alert-danger alert-dismissible" id="sub_categoris_unknown">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a>@lang('home.empty_sub_categories')
        </div>
        <select name="category_id" id="sub_categoris" class="form-control" >
            <option value="">@lang('home.select_one')</option>
            @if(isset($info))
            @include('dashboard.ads.select_sub_categories_loop_for_update')
            @endif
        </select>
        </div>
    </div>
    <div class="form-group" >
    <label class="control-label col-lg-3">@lang('home.add_type') <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9"> 
        <select name="add_type" class="form-control" >
            <option value="own" 
                @if(Request::old('add_type') == "own") 
                selected 
                @elseif(isset($info))
                    @if($info->type_ad == 'own')
                        selected 
                    @endif
                @endif
            >@lang('home.own') </option>
            <option value="rent" 
                @if(Request::old('add_type') == "rent")
                selected 
                @elseif(isset($info))
                    @if($info->type_ad == 'rent')
                        selected 
                    @endif
                @endif
            >
                @lang('home.rent')
            </option> 
            <option value="purchase" 
                @if(Request::old('add_type') == "purchase")
                selected  
                @elseif(isset($info))
                    @if($info->type_ad == 'purchase')
                        selected 
                    @endif
                @endif
            >
                    @lang('home.purchase') 
            </option>
            <option value="other" 
                @if(Request::old('add_type') == "other")
                    selected 
                @elseif(isset($info))
                    @if($info->type_ad == 'other')
                        selected 
                    @endif
                @endif
            >
                @lang('home.other') 
            </option>
           
        </select>
        </div>
    </div>
    @if($site_langs->count() > 0)
    @foreach($site_langs as $key => $lang)
    <!-- categories input -->
    <input type="hidden" name="lang[]" value="{{ @$lang->id }}">
    <!-- title ar input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.title_'.@$lang->info->local) <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9">
            <input  type="text"
                    name="title[]" 
                    class="form-control" 
                    placeholder="@lang('home.title_'.@$lang->info->local)" 
                    @if(isset(Request::old('title')[$key]))
                        value="{{Request::old('title')[$key]}}"
                    @else
                        value="{{ $info->translations->where('lang_id',$lang->id)->first()->title }}" 
                    
                    @endif>
        </div>
    </div>
    <!-- /title ar input -->
    <!-- title ar input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.location_'.@$lang->info->local) <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9">
            <input type="text" 
                   name="address[]" 
                   class="form-control" 
                   placeholder="@lang('home.location_'.@$lang->info->local)" 
                    @if(isset(Request::old('address')[$key]))
                     value="{{Request::old('address')[$key]}}"
                    @else
                        value="{{ $info->translations->where('lang_id',$lang->id)->first()->address }}"
                    @endif>
        </div>
    </div>
    <!-- /title ar input -->
      {{-- content ar --}}
     <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.content_'.@$lang->info->local) <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9">
            <textarea name="content[]"
                       id="editor1" 
                       rows="4" 
                       cols="4"  
                       placeholder="@lang('home.content_'.@$lang->info->local)"> 
                        @if(isset(Request::old('content')[$key]))
                            {{Request::old('content')[$key]}}
                        @else
                        {{ $info->translations->where('lang_id',$lang->id)->first()->content }}
                        @endif
            </textarea>
        </div>
    </div>
   
    {{-- content ar --}}
    @endforeach
    @endif
    <!-- space input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.space')</label>
        <div class="col-lg-9">
            <input type="text" 
            name="space" 
            class="form-control " 
            placeholder="@lang('home.space')" 
            value="{{ @$info->space }}" >
        </div>
    </div>
    <!-- /space input -->
    <!-- bed_room input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.bed_room')</label>
        <div class="col-lg-9">
            <input type="text" 
            name="bed_room" 
            class="form-control" 
            value="{{ @$info->bed_room }}"  >
        </div>
    </div>
    <!-- /bed_room input -->
    <!-- bathroom input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.bathroom')</label>
        <div class="col-lg-9">
            <input type="text" 
            name="bathroom" 
            class="form-control" 
            value="{{ @$info->bathroom }}" 
             >
        </div>
    </div>
    <!-- /bathroom input -->
   <!-- parking input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.parking')</label>
        <div class="col-lg-9">
            <input type="text" 
            name="parking" 
            class="form-control" 
            value=" {{ @$info->parking }}" >
        </div>
    </div>
    <!-- /parking input -->
  
    <!-- url input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.price') <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9">
            <input type="text" 
            name="price" 
            class="form-control"  
            placeholder="@lang('home.price')" 
            value="{{ @$info->price }}">
        </div>
    </div>
    <!-- /url input -->

    <!-- url input -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.embedded_map') <span class="text-danger" title="@lang('home.required')">*</span></label>
        <div class="col-lg-9">
            <input type="text" name="map" class="form-control"  placeholder="@lang('home.embedded_map')" value="{!! @$info->map !!}">
        </div>
    </div>
    <!-- /url input -->

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
                        <input type="radio" 
                        name="status" 
                        class="switch" 
                        value="show" @if($info->status == "show")
                                    checked 
                                     @endif>
                    <label>
                         @lang('home.show')
                    </label>
            </div>
        </div>
         <div class="col-lg-4">
            <div class="checkbox checkbox-switch">
                    <input type="radio"
                     name="status"
                     class="switch"
                     value="hide"  
                    @if($info->status == "hide")
                        checked 
                    @endif>
                    <label>
                        @lang('home.hide')
                    </label>
            </div>
        </div>
    </div>
    {{--Show page --}}
     
    <!-- images uploader -->
    <div class="form-group">
        <label class="control-label col-lg-3">@lang('home.images') <span class="text-danger" title="@lang('home.required')"> *</span></label>
        <div class="col-lg-9">
            <input type="file" name="images[]" class="file-styled" multiple >
        </div>
    </div>
    <!-- /images uploader -->
 
</fieldset>
{{-- general Info --}}