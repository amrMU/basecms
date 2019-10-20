<?php $__env->startSection('style'); ?>
    <script type="text/javascript" src="<?php echo e(asset('/')); ?>assets/js/pages/dashboard.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
        <!-- Main content -->
        <div class="content-wrapper">
                        <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4><i class="icon-arrow-right6 position-left"></i>  <?php echo app('translator')->getFromJson('home.dashboard'); ?>  - <?php echo app('translator')->getFromJson('home.about_us'); ?> - <span class="text-semibold"><?php echo app('translator')->getFromJson('home.update'); ?></span> </h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
                        <li class=""><?php echo app('translator')->getFromJson('home.about_us'); ?></li>
                        <li class="active"><?php echo app('translator')->getFromJson('home.update'); ?> </li>
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
                   
                        <h5 class="panel-title" > <?php echo app('translator')->getFromJson('home.update'); ?> </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="POST" action="<?php echo e(URL::to(LaravelLocalization::getCurrentLocale().'/admin/aboutus')); ?>" enctype='multipart/form-data'>
                                <?php if($errors->any()): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger alert-dismissible" >
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a><?php echo e(@$error); ?>

                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a><?php echo e(Session::get('success')); ?>

                                </div>
                                <?php endif; ?>
                                <?php echo csrf_field(); ?>
                                
                                <fieldset class="content-group">
                                    <legend class="text-bold"><?php echo app('translator')->getFromJson('home.update_info'); ?></legend>
                                    <input type="hidden" name="lang[]" value="ar">
                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.title_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="title[]" class="form-control" placeholder="<?php echo app('translator')->getFromJson('home.title_ar'); ?>" value="<?php echo e(@$info->translation->title); ?>">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->
                                    
                                     <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.content_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                             <textarea name="content[]" class="form-control" rows="4" cols="4"  placeholder="<?php echo app('translator')->getFromJson('home.content_ar'); ?>"><?php echo e(@$info->translation->content); ?></textarea>
                                        </div>
                                    </div>
                                     
                                    
                                     <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.mission_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                             <textarea name="mission[]" class="form-control" rows="4" cols="4"  placeholder="<?php echo app('translator')->getFromJson('home.mission_ar'); ?>"><?php echo e(@$info->translation->mission); ?></textarea>
                                        </div>
                                    </div>
                                     

                                     
                                     <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.goals_ar'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                             <textarea name="goals[]" class="form-control" rows="4" cols="4"  placeholder="<?php echo app('translator')->getFromJson('home.goals_ar'); ?>"><?php echo e(@$info->translation->goals); ?></textarea>
                                        </div>
                                    </div>
                                     

                                    <!-- title ar input -->
                                    <div class="form-group">
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.url_page'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>">*</span></label>
                                        <div class="col-lg-9">
                                            <input type="text" name="url" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.url_page'); ?>" value="<?php echo e(@@$info->url); ?>">
                                        </div>
                                    </div>
                                    <!-- /title ar input -->
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
                                        <label class="control-label col-lg-3"><?php echo app('translator')->getFromJson('home.image'); ?> <span class="text-danger" title="<?php echo app('translator')->getFromJson('home.required'); ?>"> *</span></label>
                                        <div class="col-lg-9">
                                            <input type="file" name="image" class="file-styled" >
                                        </div>
                                    </div>
                                    <!-- /Logo uploader -->
                                 
                                </fieldset>
                                
                              
                           
                                <div class="text-right">
                                    <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <img src="<?php echo e(url('/').@$info->image); ?>" class="img-responsive" style="max-width:100%" >
                    </div>
                    <!-- /form validation -->
                
                   
            </div>
             <!-- Content area -->

        </div>
        <!-- Main content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsCode'); ?>
    <script type="text/javascript">
          // Full featured editor
        CKEDITOR.replace( 'editor1',{
            extraPlugins: 'forms'
        });
        CKEDITOR.replace( 'editor2',{
            extraPlugins: 'forms'
        });
        CKEDITOR.replace( 'editor3',{
            extraPlugins: 'forms'
        });
            CKEDITOR.config.extraPlugins = 'justify';

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>