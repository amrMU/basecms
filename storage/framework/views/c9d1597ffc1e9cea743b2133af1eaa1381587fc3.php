<?php if($site_langs->count() > 0): ?>
<?php $__currentLoopData = $site_langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <input type="hidden" name="lang[]" value="<?php echo e(@$lang->id); ?>">
    <!-- title ar input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.name_'.@$lang->info->local); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
           
            <input type="text" name="name[]" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.name_'.@$lang->info->local); ?>" value="<?php if($info): ?><?php echo e(@$info->translations->where('lang_id',$lang->id)->first()->name); ?><?php endif; ?>">
        </div>
    </div>
    <!-- /title ar input -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
<?php endif; ?>


 <!-- Meta Tags input -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.meta_tags'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
        <div class="col-lg-9">
            <input type="text" name="meta_tags" class="form-control tokenfield" value="<?php echo app('translator')->getFromJson('home.placeholder_metatags'); ?>" value="<?php echo e(@$info->meta_tags); ?>">
        </div>
    </div>
    <!-- /Meta Tags input -->
    <!-- Logo uploader -->
    <div class="form-group">
        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.icon'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
        <div class="col-lg-9">
            <input type="file" name="icon" class="file-styled" >
        </div>
    </div>
    <!-- /Logo uploader -->