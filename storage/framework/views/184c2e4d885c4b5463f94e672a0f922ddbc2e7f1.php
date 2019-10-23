<?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e(@$sub->id); ?>" <?php if($sub->id == $info->category_id): ?> selected <?php endif; ?>>
        <?php echo e(@$sub->category_translation->name); ?> 
    </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>