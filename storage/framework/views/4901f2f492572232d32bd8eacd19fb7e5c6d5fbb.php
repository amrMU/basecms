
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#banned<?php echo e(@$ad->id); ?>">
<li class="icon-blocked"></li>
</button>


<!-- Modal -->
<div id="banned<?php echo e(@$ad->id); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('home.banned_list_messages'); ?></h4>
      </div>
      <div class="modal-body">
        <table class="table  table-border">
          <?php $__currentLoopData = $ad->blocked; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <th>#</th>
            <th><?php echo e(@$request->id); ?></th>
          </tr>
          <tr>
            <th><?php echo app('translator')->getFromJson('home.name'); ?></th>
            <th><?php echo e(@$request->user->fname); ?></th>
          </tr>
          <tr>
            <th><?php echo app('translator')->getFromJson('home.phone'); ?></th>
            <th><?php echo e(@$request->user->phone); ?></th>
          </tr>
          <tr>
            <th><?php echo app('translator')->getFromJson('home.email'); ?></th>
            <th><?php echo e(@$request->user->email); ?></th>
          </tr>
          <tr>
            <th><?php echo app('translator')->getFromJson('home.content'); ?></th>
            <th><?php echo e(@$request->message); ?></th>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('home.close'); ?></button>
       

      </div>
    </div>

  </div>
</div>