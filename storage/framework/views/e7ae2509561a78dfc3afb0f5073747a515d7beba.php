<?php $__env->startSection('meta_tags'); ?>
    <title> <?php echo e(@$page->translation->title); ?> | <?php echo e(@$setting->translation->title); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" <?php echo e(@$page->translation->title); ?> | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content=" <?php echo e(@$page->translation->title); ?> | <?php echo e(@$setting->translation->title); ?>" />
    <meta name="twitter:site"content="@wait" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main>

        <!-- =====================================
        ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="<?php echo e(asset('/front')); ?>/images/banner-1.jpg">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        <h1> <?php echo e(@$page->translation->title); ?> </h1>
                        <h5><a href="<?php echo e(URL::To('/')); ?>">الرئسية</a><span>/</span><a href="#"><?php echo e(@$page->translation->title); ?></a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start Page  -->

        <section class="page section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="intro">
                            <h6><?php echo e(@$page->translation->title); ?></h6>
                            <p><?php echo @$page->translation->content; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Page  ====
        ======================================= -->



        <?php echo $__env->make('front.testmonials.for_base_pages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>