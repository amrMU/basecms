

<?php if($ad->status == "show"): ?>
<a href="<?php echo e(URL::to('/admin/banned_ads').'/'.@$ad->id.'/hide'); ?>" title="<?php echo app('translator')->getFromJson('home.hide'); ?>" class="btn btn-warning"><li class="icon-eye-blocked"></li></a>
<?php else: ?> 

<a href="<?php echo e(URL::to('/admin/banned_ads').'/'.@$ad->id.'/show'); ?>" title="<?php echo app('translator')->getFromJson('home.show'); ?>" class="btn btn-warning"><li class="icon-eye"></li></a>
<?php endif; ?>