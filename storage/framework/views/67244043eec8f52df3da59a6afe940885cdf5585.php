<?php $__env->startSection('content'); ?>

<!-- Main content -->
<div class="content-wrapper">
            <!-- Page header -->
<div class="page-header page-header-default">
    <div class="page-header-content">
        <div class="page-title">
        <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold"><?php echo app('translator')->getFromJson('home.home'); ?></span> - <?php echo app('translator')->getFromJson('home.blog_list'); ?></h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
            </div>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
            <li><a href="<?php echo e(URL::to('ar/admin/blogs')); ?>"><i class="icon-blogger position-left"></i> <?php echo app('translator')->getFromJson('home.blogs'); ?></a></li>
            <li class="active"><?php echo app('translator')->getFromJson('home.blog_list'); ?></li>
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
         <?php echo $__env->make('dashboard.blogs.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- table lists -->
        <div class="table-responsive">
        <?php if(Session('success')): ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong><?php echo app('translator')->getFromJson('home.success'); ?>!</strong> <?php echo e(session('success')); ?>.
        </div>
        <?php endif; ?>
            <!--  -->
            <table class="table text-nowrap table " id="table">
                <thead>
                <tr>
                    <th class="col-md-2">#</th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.name_ar'); ?></th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.name_en'); ?></th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.icon'); ?></th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.status'); ?></th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.edit'); ?></th>
                    <th class="col-md-2"><?php echo app('translator')->getFromJson('home.delete'); ?></th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><span class="text-semibold"><?php echo e(@$blog->id); ?></span></td>
                    <td><span class="text-semibold"><?php echo e(@$blog->title_ar); ?></span></td>
                    <td><span class="text-muted"><?php echo e(@$blog->title_en); ?></span></td>
                    <td>
                        <img src="<?php echo e(url('/'). @$blog->image); ?>" width="50" height="50" class="img-responsive" alt="<?php echo e(@$blogs->name_ar); ?>">
                    </td>
                    <td>
                        <?php if($blog->status == 'show'): ?>
                            <?php echo app('translator')->getFromJson('home.show'); ?>
                        <?php else: ?>
                            <?php echo app('translator')->getFromJson('home.hide'); ?>
                        <?php endif; ?>


                    </td>
                    <td>
                        <a href="<?php echo e(URL::to('ar/admin/blogs/').'/'.$blog->id.'/edit'); ?>" class="btn btn-warning "><li class="icon-pencil5"></li></a>
                    </td>

                    <td><?php echo $__env->make('dashboard.blogs.delete_from_list', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div style="padding:0 22%; margin-bottom: 24px;" class="center-block">
            <?php echo e(@$blogs->links()); ?>

            </div>
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

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>