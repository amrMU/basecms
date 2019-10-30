<!-- ads input -->
<div class="form-group">
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.ads'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
    <div class="col-lg-9">
        <select name="category_id" class="form-control">
            <option value=""><?php echo app('translator')->getFromJson('home.select_one'); ?></option>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e(@$category->id); ?>" <?php if(@$category->id == @$info->category_id): ?> selected <?php endif; ?>><?php echo e(@$category->translations->first()->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
</div>
<!-- ads input -->
<!-- title input -->
<div class="form-group">
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.title'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
    <div class="col-lg-9">
        <input type="text" name="title" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.title'); ?>" value="<?php if($info): ?><?php echo e(@$info->title); ?><?php endif; ?>">
    </div>
</div>
<!--/title input -->
  <!-- content input -->
<div class="form-group">
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.content'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
    <div class="col-lg-9">
        <textarea name="content" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.content'); ?>"><?php if($info): ?><?php echo @$info->content; ?><?php endif; ?></textarea>
    </div>
</div>
<!--/content input -->

<!-- Logo uploader -->
<div class="form-group">
    <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.image'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
    <div class="col-lg-9">
        <input type="file" name="image" class="file-styled" >
    </div>
</div>
<!--/Logo uploader -->