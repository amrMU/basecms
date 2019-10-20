                                {{-- general Info --}}
                                <fieldset class="content-group">
                                    <legend class="text-bold">@lang('home.create_ad')</legend>
                                    <!-- categories input -->
                                    <div class="form-group" id="main_category">
                                    <label class="control-label col-lg-3">@lang('home.main_categories') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9"> 
                                        <select name="parent_id" class="form-control" >
                                            <option value="">@lang('home.select_one')</option>
                                            @foreach($categories as $category)
                                            <option value="{{@$category->id}}">
                                                {{@$category->category_translation->name}}
                                                
                                            </option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="sub_category">
                                    <label class="control-label col-lg-3">@lang('home.sub_categories') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9"> 
                                        <select name="parent_id" class="form-control" >
                                            <option value="">@lang('home.select_one')</option>
                                           
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                    <label class="control-label col-lg-3">@lang('home.add_type') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9"> 
                                        <select name="add_type" class="form-control" >
                                            <option value="">@lang('home.select_one')</option>
                                           
                                        </select>
                                        </div>
                                    </div>
                                    <!-- categories input -->
                                    <input type="hidden" name="lang[]" value="ar">
                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.title_ar') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title[]" class="form-control" placeholder="@lang('home.title_ar')" value="">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->
                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.address') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="address[]" class="form-control" placeholder="@lang('home.address')" value="">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->
                                      {{-- content ar --}}
                                     <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.content_ar') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                             <textarea name="content[]" id="editor1" rows="4" cols="4"  placeholder="@lang('home.content_ar')"></textarea>
                                        </div>
                                    </div>
                                   
                                    {{-- content ar --}}
                                    <!-- space input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.space') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="space[]" class="form-control " placeholder="" >
                                        </div>
                                    </div>
                                    <!-- /space input -->
                                    <!-- bed_room input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.bed_room') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="bed_room[]" class="form-control " >
                                        </div>
                                    </div>
                                    <!-- /bed_room input -->
                                    <!-- bathroom input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.bathroom') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="bathroom[]" class="form-control " >
                                        </div>
                                    </div>
                                    <!-- /bathroom input -->
                                   <!-- parking input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.parking') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="parking[]" class="form-control" >
                                        </div>
                                    </div>
                                    <!-- /parking input -->
                                  
                                    <!-- url input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.price') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="price" class="form-control"  placeholder="@lang('home.price')" value="{{Request::old('price')}}">
                                        </div>
                                    </div>
                                    <!-- /url input -->

                                    <!-- url input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.embedded_map') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="map" class="form-control"  placeholder="@lang('home.embedded_map')" value="{{Request::old('map')}}">
                                        </div>
                                    </div>
                                    <!-- /url input -->

                                    <!-- url input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.url_page') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="url" class="form-control"  placeholder="@lang('home.url_page')" value="{{Request::old('url')}}">
                                        </div>
                                    </div>
                                    <!-- /url input -->
                                    <!-- Meta Tags input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.meta_tags') <span class="text-danger" title="@lang('home.required')">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="meta_tags" class="form-control tokenfield" value="@lang('home.placeholder_metatags')" value="{{Request::old('meta_tags')}}">
                                        </div>
                                    </div>
                                    <!-- /Meta Tags input -->
                               
                                   
                                    {{-- Show page --}}
                                     <div class="form-group">
                                        <label class="control-label col-lg-3">@lang('home.status')</label>
                                        <div class="col-lg-4">
                                            <div class="checkbox checkbox-switch">
                                                        <input type="radio" name="status" class="switch" value="show" >
                                                    <label>
                                                         @lang('home.show')
                                                    </label>
                                            </div>
                                        </div>
                                         <div class="col-lg-4">
                                            <div class="checkbox checkbox-switch">
                                                    <input type="radio" name="status" class="switch" value="hide"  >
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
                                            <input type="file" name="images[]" class="file-styled" >
                                        </div>
                                    </div>
                                    <!-- /images uploader -->
                                 
                                </fieldset>
                                {{-- general Info --}}