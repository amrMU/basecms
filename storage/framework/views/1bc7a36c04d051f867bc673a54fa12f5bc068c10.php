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
                        <h4><i class="icon-arrow-right6 position-left"></i> <?php echo app('translator')->getFromJson('home.dashboard'); ?>  -  <?php echo app('translator')->getFromJson('home.ads'); ?> - <?php echo app('translator')->getFromJson('home.ads_list'); ?> </h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                         </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(URL::to('ar/admin/home')); ?>"><i class="icon-home2 position-left"></i> <?php echo app('translator')->getFromJson('home.home'); ?></a></li>
                              <li><a href="<?php echo e(URL::to('ar/admin/ads')); ?>"><i class="icon-statistics position-left"></i> <?php echo app('translator')->getFromJson('home.ads'); ?></a></li>
                        <li class="active"><?php echo app('translator')->getFromJson('home.create_ad'); ?></li>
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
                    <div class="panel panel-flat col-md-12">
    

                        <div class="panel-heading">
                   
                        <h5 class="panel-title" > <?php echo app('translator')->getFromJson('home.create_ad'); ?> </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse"></a></li>
                                    <li><a data-action="reload"></a></li>
                                    <li><a data-action="close"></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <form class="form-horizontal form-validate-jquery" method="POST" action="<?php echo e(URL::to('/admin/ads')); ?>" enctype='multipart/form-data'>
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
                                <?php echo $__env->make('dashboard.ads.form', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-left13 position-right"></i></button>
                                </div>
                            </form>
                        </div>
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

//script getting sub categories fillter
$('#sub_categoris_unknown').hide()
$('#parent_id').on('change',function () {
    if ($(this).val() != '') {
        var parent_id = $(this).val();
        $.ajax({
            'url' : '<?php echo e(URL::to('/')); ?>/api/categories/' + parent_id,
            'type' : 'GET',
            'success' : function(data) {     
               console.log(data.data.length );
                if (data.data.length == 0) {
                    $('#sub_categoris').fadeOut();
                    $('#sub_categoris_unknown').fadeIn(3000);
                } //where sub categories list  length = 0
                else{//where sub categories list  length  > 0 will append in #sub_categoris

                    $('#sub_categoris').fadeIn(4000);
                    $('#sub_categoris_unknown').fadeOut();
                    $('#sub_categoris').empty()
                    for (var i = data.data.length - 1; i >= 0; i--) {
                        $('#sub_categoris').append("<option value='"+data.data[i].id+"'>"+data.data[i].category_translation.name+"</option")   
                    }
                }   
            }//server success case 
            ,'error' : function(request,error)
            {
                $('#sub_categoris').fadeOut();
                $('#sub_categoris_unknown').fadeIn(4000);
            }//server error case 
        });
    }else{
        $('#sub_categoris').fadeOut();
        $('#sub_categoris_unknown').fadeIn(400);
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>