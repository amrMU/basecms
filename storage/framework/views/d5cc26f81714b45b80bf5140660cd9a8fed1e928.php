<?php $__env->startSection('meta_tags'); ?>
    <title> من نحن | <?php echo e(@$setting->translation->title); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" <?php echo app('translator')->getFromJson('home.aboutus'); ?> | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/about_us')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content=" من نحن | <?php echo e(@$setting->translation->title); ?>" />
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
                        <h1> من نحن </h1>
                        <h5><a href="<?php echo e(URL::To('/')); ?>">الرئيسيه</a><span>/</span><a href="#0">من نحن</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start about  -->

        <section class="about section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 valign">
                        <div class="intro">
                            <h6><?php echo e(@$info->translation->title); ?></h6>
                            <p><?php echo @$info->translation->content; ?></p>
                            
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="img">
                            <img src="<?php echo e(asset('/')); ?><?php echo e(@$info->image); ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 valign">
                        <div class="feat">
                            <ul>
                        
                                <li><span class="icon flaticon-home-2"></span> شقق </li>
                                <li><span class="icon flaticon-hotel-2"></span> فنادق </li>
                                <li><span class="icon flaticon-sunbed"></span> شاليهات </li>
                                <li><span class="icon flaticon-home"></span> فيلات </li>
                                <li><span class="icon flaticon-hotel-1"></span> إداري </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End about  ====
        ======================================= -->



        <!-- =====================================
        ==== Start blocks  -->

        <section class="blocks bg-img" data-background="<?php echo e(asset('/front')); ?>/images/b1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 offset-lg-7 col-md-7 offset-md-5">
                        <div class="content">
                            <h5>مهمتنا</h5>
                            <div class="text" ><?php echo @$info->translation->mission; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End blocks  ====
        ======================================= -->



        <!-- =====================================
        ==== Start numbers  -->

        <section class="numbers section-padding">
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $categories_has_ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2>
                                <!-- <span class="icon hot-color flaticon-home-2"></span> -->
                                <img src="<?php echo e(URL::to('/').@$category->icon); ?>">
                             <?php echo e(@$category->ads->count()); ?> </h2>
                            <p><?php echo e(@$category->category_translation->name); ?></p>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>

        <!-- End numbers  ====
        ======================================= -->



        <!-- =====================================
        ==== Start blocks  -->

        <section class="blocks b2 bg-img" data-background="<?php echo e(asset('/front')); ?>/images/b2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-7">
                        <div class="content">
                            <h5>أهدافنا</h5>
                            <div class="text" ><?php echo @$info->translation->goals; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End blocks  ====
        ======================================= -->


        <?php echo $__env->make('front.testmonials.for_base_pages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>