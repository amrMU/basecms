
<fieldset class="content-group">
    <legend class="text-bold"><?php echo app('translator')->getFromJson('home.create_ad'); ?></legend>
    <!-- categories input -->
    <div class="form-group" id="main_category">
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.main_categories'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9"> 
        <select name="category_id" id="parent_id" class="form-control" >
            <option value=""><?php echo app('translator')->getFromJson('home.select_one'); ?></option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option 
            value="<?php echo e(@$category->id); ?>"
             <?php if(isset($info)): ?>
             <?php if($category->id == $info->category->parent_id): ?>
              selected
              <?php elseif($category->id == $info->id): ?>
              selected
               <?php endif; ?>
               <?php endif; ?>
               >
                <?php echo e(@$category->category_translation->name); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        </div>
    </div>
    <div class="form-group" >
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.sub_categories'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9"> 
         <div class="alert alert-danger alert-dismissible" id="sub_categoris_unknown">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a><?php echo app('translator')->getFromJson('home.empty_sub_categories'); ?>
        </div>
        <select name="sub_categoris" id="sub_categoris" class="form-control" >
            <option value=""><?php echo app('translator')->getFromJson('home.select_one'); ?></option>
            <?php if(isset($info)): ?>
            <?php echo $__env->make('dashboard.ads.select_sub_categories_loop_for_update', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
        </select>
        </div>
    </div>
    <div class="form-group" >
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.add_type'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9"> 
        <select name="add_type" class="form-control" >
            <option value="own" 
                <?php if(Request::old('add_type') == "own"): ?> 
                selected 
                <?php elseif(isset($info)): ?>
                    <?php if($info->type_ad == 'own'): ?>
                        selected 
                    <?php endif; ?>
                <?php endif; ?>
            ><?php echo app('translator')->getFromJson('home.own'); ?> </option>
            <option value="rent" 
                <?php if(Request::old('add_type') == "rent"): ?>
                selected 
                <?php elseif(isset($info)): ?>
                    <?php if($info->type_ad == 'rent'): ?>
                        selected 
                    <?php endif; ?>
                <?php endif; ?>
            >
                <?php echo app('translator')->getFromJson('home.rent'); ?>
            </option> 
            <option value="purchase" 
                <?php if(Request::old('add_type') == "purchase"): ?>
                selected  
                <?php elseif(isset($info)): ?>
                    <?php if($info->type_ad == 'purchase'): ?>
                        selected 
                    <?php endif; ?>
                <?php endif; ?>
            >
                    <?php echo app('translator')->getFromJson('home.purchase'); ?> 
            </option>
            <option value="other" 
                <?php if(Request::old('add_type') == "other"): ?>
                    selected 
                <?php elseif(isset($info)): ?>
                    <?php if($info->type_ad == 'other'): ?>
                        selected 
                    <?php endif; ?>
                <?php endif; ?>
            >
                <?php echo app('translator')->getFromJson('home.other'); ?> 
            </option>
           
        </select>
        </div>
    </div>
    <?php if($site_langs->count() > 0): ?>
    <?php $__currentLoopData = $site_langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- categories input -->
    <input type="hidden" name="lang[]" value="<?php echo e(@$lang->id); ?>">
    <!-- title ar input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.title_'.@$lang->info->local); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
            <input  type="text"
                    name="title[]" 
                    class="form-control" 
                    placeholder="<?php echo app('translator')->getFromJson('home.title_'.@$lang->info->local); ?>" 
                    <?php if(isset(Request::old('title')[$key])): ?>
                        value="<?php echo e(Request::old('title')[$key]); ?>"
                    <?php elseif(isset($info) != false): ?>
                        value="<?php echo e(@$info->translations->where('lang_id',@$lang->id)->first()->title); ?> " 
                    <?php endif; ?> >
        </div>
    </div>
    <!-- /title ar input -->
    <!-- title ar input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.location_'.@$lang->info->local); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
            <input type="text" 
                   name="address[]" 
                   class="form-control" 
                   placeholder="<?php echo app('translator')->getFromJson('home.location_'.@$lang->info->local); ?>" 
                    <?php if(isset(Request::old('address')[$key])): ?>
                     value="<?php echo e(Request::old('address')[$key]); ?>"
                    <?php elseif(isset($info) != false): ?>
                        value="<?php echo e(@$info->translations->where('lang_id',@$lang->id)->first()->address); ?>"
                    <?php endif; ?>>
        </div>
    </div>
    <!-- /title ar input -->
      
     <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.content_'.@$lang->info->local); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
            <textarea name="content[]"
                       id="editor1" 
                       rows="4" 
                       cols="4"  
                       placeholder="<?php echo app('translator')->getFromJson('home.content_'.@$lang->info->local); ?>"> 
                        <?php if(isset(Request::old('content')[$key])): ?>
                            <?php echo e(Request::old('content')[$key]); ?>

                        <?php elseif(isset($info) != false): ?>
                        <?php echo e($info->translations->where('lang_id',$lang->id)->first()->content); ?>

                        <?php endif; ?>
            </textarea>
        </div>
    </div>
   
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <!-- space input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.space'); ?></label>
        <div class="col-lg-9">
            <input type="text" 
            name="space" 
            class="form-control " 
            placeholder="<?php echo app('translator')->getFromJson('home.space'); ?>" 
            value="<?php if(Request::old('space')!== null): ?>
            <?php echo e(Request::old('space')); ?>

            <?php else: ?><?php echo e(@$info->space); ?><?php endif; ?>" >
        </div>
    </div>
    <!-- /space input -->
    <!-- bed_room input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.bed_room'); ?></label>
        <div class="col-lg-9">
            <input type="text" 
            name="bed_room" 
            class="form-control" 
            placeholder="<?php echo app('translator')->getFromJson('home.bed_room'); ?>" 
            
            value="<?php if(Request::old('bed_room')!== null): ?>
            <?php echo e(Request::old('bed_room')); ?>

            <?php else: ?><?php echo e(@$info->bed_room); ?><?php endif; ?>"  >
        </div>
    </div>
    <!-- /bed_room input -->
    <!-- bathroom input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.bathroom'); ?></label>
        <div class="col-lg-9">
            <input type="text" 
            name="bathroom" 
            class="form-control" 
            placeholder="<?php echo app('translator')->getFromJson('home.bathroom'); ?>" 
            value="<?php if(Request::old('bathroom')!== null): ?>
            <?php echo e(Request::old('bathroom')); ?>

            <?php else: ?><?php echo e(@$info->bathroom); ?><?php endif; ?>" 
             >
        </div>
    </div>
    <!-- /bathroom input -->
   <!-- parking input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.parking'); ?></label>
        <div class="col-lg-9">
            <input type="text" 
            name="parking" 
            class="form-control" 
            placeholder="<?php echo app('translator')->getFromJson('home.parking'); ?>" 
            value="<?php if(Request::old('parking')!== null): ?>
            <?php echo e(Request::old('parking')); ?>

            <?php else: ?><?php echo e(@$info->parking); ?><?php endif; ?>" >
        </div>
    </div>
    <!-- /parking input -->
  
    <!-- url input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.price'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
            <input type="text" 
            name="price" 
            class="form-control"  
            placeholder="<?php echo app('translator')->getFromJson('home.price'); ?>" 
            value="<?php if(Request::old('price')!== null): ?>
            <?php echo e(Request::old('price')); ?>

            <?php else: ?><?php echo e(@$info->price); ?><?php endif; ?>">
        </div>
    </div>
    <!-- /url input -->

    <!-- url input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.embedded_map'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
            <input type="text" name="map" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.embedded_map'); ?>" value="<?php echo @$info->map; ?>">
        </div>
    </div>
    <!-- /url input -->

    <!-- url input -->
   
    <!-- /url input -->
    <!-- Meta Tags input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.meta_tags'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
            <input type="text" name="meta_tags" class="form-control tokenfield" value="<?php echo app('translator')->getFromJson('home.placeholder_metatags'); ?>" value="<?php echo e(@$info->meta_tags); ?>">
        </div>
    </div>
    <!-- /Meta Tags input -->

   
    
     <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.status'); ?></label>
        <div class="col-lg-4">
            <div class="checkbox checkbox-switch">
                        <input type="radio" 
                        name="status" 
                        class="switch" 
                        value="show"
                        <?php if(isset($info) != false): ?>
                        <?php if($info->status == "show"): ?>
                                    checked 
                        <?php endif; ?>
                        <?php else: ?>
                            checked 
                        <?php endif; ?>

                        >
                    <label>
                         <?php echo app('translator')->getFromJson('home.show'); ?>
                    </label>
            </div>
        </div>
         <div class="col-lg-4">
            <div class="checkbox checkbox-switch">
                    <input type="radio"
                     name="status"
                     class="switch"
                     value="hide"  
                    <?php if(isset($info) != false): ?>
                    <?php if($info->status == "hide"): ?>
                        checked 
                    <?php endif; ?>
                    <?php endif; ?>
                    >
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
            <input type="file" name="images[]" class="file-styled" multiple >
        </div>
    </div>
    <!-- /images uploader -->
 
</fieldset>
