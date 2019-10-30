<?php $__env->startSection('content'); ?>
        <!-- Main content -->
        <div class="content-wrapper">
                        <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold"><?php echo app('translator')->getFromJson('home.categories'); ?></span> - <?php echo app('translator')->getFromJson('home.dashboard'); ?></h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
                        <li class="active"><?php echo app('translator')->getFromJson('home.update_info'); ?></li>
                    </ul>

                    <ul class="breadcrumb-elements">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear position-left"></i>
                                <?php echo app('translator')->getFromJson('home.settings'); ?>
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                              
                              <li><a href="<?php echo e(URL::to('ar/admin/setting')); ?>"><i class="icon-gear"></i><?php echo app('translator')->getFromJson('home.settings'); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->

             <!-- Content area -->
            <div class="content">
                <!-- Form validation -->
                    <div class="panel panel-flat col-md-10">
                        <div class="panel-heading">
                            <h5 class="panel-title"><?php echo app('translator')->getFromJson('home.update_info'); ?></h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="post" action="<?php echo e(@route('testmonials.update',$info)); ?>" enctype='multipart/form-data'  >
                            <input name="_method" type="hidden" value="PUT">
                            <input name="use" type="hidden" value="<?php echo e(@$info->id); ?>">

                                <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo e($error); ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo e(Session::get('success')); ?>

                                </div>
                                <?php endif; ?>
                                <?php echo csrf_field(); ?>
                                
                                <fieldset class="content-group">
                                <legend class="text-bold"><?php echo app('translator')->getFromJson('home.add_new_category'); ?></legend>
                                    
                                     
                                <?php echo $__env->make('dashboard.testmonials.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </fieldset>
                                
                              
                           
                                <div class="text-right">
                                 
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form validation -->
                    <div class="col-md-2">
                    <img src="<?php echo e(url('/').'/'.@$info->image); ?>" class="img-responsive" style="max-width:100%" >
                    </div>
                  
            </div>
             <!-- Content area -->

        </div>
        <!-- Main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>