
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#InfoList<?php echo e(@$list->id); ?>">
<li class="icon-reading"></li>
</button>
<!-- Modal -->
<div id="InfoList<?php echo e(@$list->id); ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo app('translator')->getFromJson('home.list_contactus_full_info'); ?></h4>
      </div>
      <div class="modal-body table-responsive ">
      
        <table class="table table-dark   table-striped table-bordered table-borderless table-hover ">
          <tr>
              <th class="col-md-2">#</th>
              <th class="col-md-2"><?php echo e(@$list->id); ?></th>
          </tr>
          <tr>
              <th class="col-md-2"><?php echo app('translator')->getFromJson('home.name'); ?></th>
              <th class="col-md-2"><?php echo e(@$list->name); ?></th>
          </tr>
          <tr>
              <th class="col-md-2"><?php echo app('translator')->getFromJson('home.email'); ?></th>
              <th class="col-md-2"><?php echo e(@$list->email); ?></th>
          </tr>
          <tr>
              <th class="col-md-2"><?php echo app('translator')->getFromJson('home.phone'); ?></th>
              <th class="col-md-2"><?php echo e(@$list->phone); ?></th>
          </tr>
          <tr>
              <th class="col-md-2"><?php echo app('translator')->getFromJson('home.title'); ?></th>
              <th class="col-md-2"><?php echo e(@$list->subject); ?></th>
          </tr>
          <tr>
              <th class="col-md-2"><?php echo app('translator')->getFromJson('home.content'); ?></th>
              <th class="col-md-2"><?php echo e(@$list->message); ?></th>
          </tr>
        </table>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('home.close'); ?></button>
        
      </div>
    </div>

  </div>
</div>