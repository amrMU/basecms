<?php $__env->startSection('content'); ?>

<!-- Main content -->
<div class="content-wrapper">
            <!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold"><?php echo app('translator')->getFromJson('home.home'); ?></span> - <?php echo app('translator')->getFromJson('home.contactus_list'); ?></h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
            </div>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
            <li class="active"><?php echo app('translator')->getFromJson('home.contactus_list'); ?></li>
        </ul>

        <ul class="breadcrumb-elements">
            <!-- <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li> -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    <?php echo app('translator')->getFromJson('home.settings'); ?>
                    <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="<?php echo e(URL::to('ar/admin/setting')); ?>"><i class="icon-gear"></i><?php echo app('translator')->getFromJson('home.general_settings'); ?></a></li>
               
              
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- /page header -->

    <!-- Content area -->
<div class="content">
        <!-- Main charts -->
        <div class="row">
        <div class="panel panel-flat ">
        <!-- table lists -->
        <div class="table-responsive">
        <?php if(Session('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?php echo app('translator')->getFromJson('home.success'); ?>!</strong> <?php echo e(session('success')); ?>.
        </div>
        <?php endif; ?>
       <form action="<?php echo e(URL::to('/ar/admin/contactus_delete_all')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <input name="_method" type="hidden" value="DELETE">
             <div class="row" style="margin:5px;">
                <div class="col-md-2">
                    <button type="button" class="btn btn-info"  >
                    <input type="checkbox" id="select-all">  
                    <?php echo app('translator')->getFromJson('home.sellect_all'); ?></button>
                </div>
                <div class="col-md-2">
                    
                    <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#DeleteSelected">
                       <?php echo app('translator')->getFromJson('home.delete_all'); ?>
                    </button>


                    <!-- Modal -->
                    <div id="DeleteSelected" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><?php echo app('translator')->getFromJson('home.header_delete_model'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <p><?php echo app('translator')->getFromJson('home.body_delete_all_model'); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->getFromJson('home.close'); ?></button>
                          
                            <button type="submit"  class="btn btn-danger" ><?php echo app('translator')->getFromJson('home.delete_all'); ?></button>    


                        </div>
                    </div>

                </div>
            </div>

                </div>
            </div>
            <!--  -->
            
            <table class="table text-nowrap table datatable-basic" id="table">
                <thead>                  
                <tr>                                     
                    <th class="col-md-2">#</th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.name'); ?></th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.email'); ?></th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.title'); ?></th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.more'); ?></th>
                    
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.delete'); ?></th>
                    
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><span class="text-semibold">
                            <?php echo e(@$list->id); ?>

                    <input type="checkbox" name="ids[]" value="<?php echo e(@$list->id); ?>"> 

                    </span></td>
                    <td>
                        <span class="text-semibold"> <?php echo e(@$list->name); ?></span>
                    </td>
                    <td>
                        <span class="text-muted">
                            <?php echo e(@$list->email); ?>

                         </span>
                    </td>
                    <td>
                        <span class="text-semibold"> <?php echo e(@$list->subject); ?></span>
                    </td>
                   
                    <td><?php echo $__env->make('dashboard.contactus.list_full_info', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></td> 
                    <td><?php echo $__env->make('dashboard.contactus.delete_from_list', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></td> 
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </form>
            <!--  -->
        </div>
        <!-- table reports -->
    </div>
</div>

</div>
    <!-- Content area -->

</div>
<!-- Main content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsCode'); ?>
    <script>
        // Listen for click on toggle checkbox
        $('#select-all').click(function(event) {   
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;                       
                });
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>