                                
                                <fieldset class="content-group">
                                    <legend class="text-bold"><?php echo app('translator')->getFromJson('home.create_ad'); ?></legend>
                                    <!-- categories input -->
                                    <div class="form-group" id="main_category">
                                    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.main_categories'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9"> 
                                        <select name="parent_id" class="form-control" >
                                            <option value=""><?php echo app('translator')->getFromJson('home.select_one'); ?></option>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(@$category->id); ?>">
                                                <?php echo e(@$category->category_translation->name); ?>

                                                
                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="sub_category">
                                    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.sub_categories'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9"> 
                                        <select name="parent_id" class="form-control" >
                                            <option value=""><?php echo app('translator')->getFromJson('home.select_one'); ?></option>
                                           
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.add_type'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9"> 
                                        <select name="add_type" class="form-control" >
                                            <option value=""><?php echo app('translator')->getFromJson('home.select_one'); ?></option>
                                           
                                        </select>
                                        </div>
                                    </div>
                                    <!-- categories input -->
                                    <input type="hidden" name="lang[]" value="ar">
                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.title_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title[]" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.title_ar'); ?>" value="">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->
                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.address'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="address[]" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.address'); ?>" value="">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->
                                      
                                     <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.content_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                             <textarea name="content[]" id="editor1" rows="4" cols="4"  placeholder="<?php echo app('translator')->getFromJson('home.content_ar'); ?>"></textarea>
                                        </div>
                                    </div>
                                   
                                    
                                    <!-- space input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.space'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="space[]" class="form-control " placeholder="" >
                                        </div>
                                    </div>
                                    <!-- /space input -->
                                    <!-- bed_room input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.bed_room'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="bed_room[]" class="form-control " >
                                        </div>
                                    </div>
                                    <!-- /bed_room input -->
                                    <!-- bathroom input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.bathroom'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="bathroom[]" class="form-control " >
                                        </div>
                                    </div>
                                    <!-- /bathroom input -->
                                   <!-- parking input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.parking'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="parking[]" class="form-control" >
                                        </div>
                                    </div>
                                    <!-- /parking input -->
                                  
                                    <!-- url input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.price'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="price" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.price'); ?>" value="<?php echo e(Request::old('price')); ?>">
                                        </div>
                                    </div>
                                    <!-- /url input -->

                                    <!-- url input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.embedded_map'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="map" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.embedded_map'); ?>" value="<?php echo e(Request::old('map')); ?>">
                                        </div>
                                    </div>
                                    <!-- /url input -->

                                    <!-- url input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.url_page'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="url" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.url_page'); ?>" value="<?php echo e(Request::old('url')); ?>">
                                        </div>
                                    </div>
                                    <!-- /url input -->
                                    <!-- Meta Tags input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.meta_tags'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="meta_tags" class="form-control tokenfield" value="<?php echo app('translator')->getFromJson('home.placeholder_metatags'); ?>" value="<?php echo e(Request::old('meta_tags')); ?>">
                                        </div>
                                    </div>
                                    <!-- /Meta Tags input -->
                               
                                   
                                    
                                     <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.status'); ?></label>
                                        <div class="col-lg-4">
                                            <div class="checkbox checkbox-switch">
                                                        <input type="radio" name="status" class="switch" value="show" >
                                                    <label>
                                                         <?php echo app('translator')->getFromJson('home.show'); ?>
                                                    </label>
                                            </div>
                                        </div>
                                         <div class="col-lg-4">
                                            <div class="checkbox checkbox-switch">
                                                    <input type="radio" name="status" class="switch" value="hide"  >
                                                    <label>
                                                        <?php echo app('translator')->getFromJson('home.hide'); ?>
                                                    </label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     
                                    <!-- images uploader -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.images'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="file" name="images[]" class="file-styled" >
                                        </div>
                                    </div>
                                    <!-- /images uploader -->
                                 
                                </fieldset>
                                