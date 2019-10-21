<?php if($site_langs->count() > 0): ?>
<?php $__currentLoopData = $site_langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <input type="hidden" name="lang[]" value="<?php echo e(@$lang->id); ?>">

    <!-- title ar input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.title_'.@$lang->info->local); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
            <input type="text" name="title[]" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.title_'.@$lang->info->local); ?>" value="<?php echo e(@$info->translations->where('lang_id',$lang->id)->first()->title); ?>">
        </div>
    </div>
    <!-- /title ar input -->
    
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.content_'.@$lang->info->local); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
           <textarea name="content[]" id="editor<?php echo e(@$key); ?>" rows="4" cols="4"  placeholder="<?php echo app('translator')->getFromJson('home.content_'.@$lang->info->local); ?>"><?php echo e(@$info->translations->where('lang_id',$lang->id)->first()->content); ?></textarea>
       </div>
   </div>
   
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php endif; ?>

   <!-- url input -->
   <div class="form-group">
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.url_page'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="url" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.url_page'); ?>" value="<?php echo e(@$info->url); ?>">
    </div>
</div>
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
            <input type="radio" name="status" class="switch" value="show" <?php if(@$info->status  == 'show'): ?> checked="checked"  <?php endif; ?>>
            <label>
               <?php echo app('translator')->getFromJson('home.show'); ?>
           </label>
       </div>
   </div>
   <div class="col-lg-4">
    <div class="checkbox checkbox-switch">
        <input type="radio" name="status" class="switch" value="hide" <?php if(@$info->status  == 'hide'): ?> checked="checked" <?php endif; ?> >
        <label>
            <?php echo app('translator')->getFromJson('home.hide'); ?>
        </label>
    </div>
</div>
</div>


<!-- Logo uploader -->
<div class="form-group">
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.icon'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
    <div class="col-lg-9">
        <input type="file" name="icon" class="file-styled" >
    </div>
</div>
<!-- /Logo uploader -->
