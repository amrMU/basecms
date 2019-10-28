<?php $__env->startSection('meta_tags'); ?>
    <title>تسجيل الدخول | <?php echo e(@$setting->translation->title); ?></title>
    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content="تسجيل الدخول  | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/about_us')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="تسجيل الدخول  | <?php echo e(@$setting->translation->title); ?>" />
    <meta name="twitter:site"content="@wait" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <main>

        <!-- =====================================
        ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="<?php echo e(asset('/front/images/banner-1.jpg')); ?>">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        <h1>الدخول</h1>
                        <h5><a href="<?php echo e(url('/')); ?>">الرئسية</a><span>/</span><a href="#0">تسجيل الدخول</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start login  -->

        <section class="login section-padding">
            <div class="container">

                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">

                            <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                                <div class="register-form">
                                    <h5 class="title"><span>تسجيل الدخول</span></h5>
                                    <form method="POST" action="<?php echo e(route('login')); ?>">
                                    <?php echo csrf_field(); ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"  name="email" value="<?php echo e(old('email')); ?>" placeholder="البريد الالكترونى">
                                                <?php if($errors->has('email')): ?>
                                                <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="الرقم السرى">
                                                <?php if($errors->has('password')): ?>
                                                <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger"><?php echo e($errors->first('password')); ?></strong>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button>تسجيل</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text hvcont">
                                        ليس لديك حساب حتى الآن؟ <a href="<?php echo e(URL::to('/register')); ?>">أنشئ حسابا</a> <br>
                                         <?php if(Route::has('password.request')): ?>
                                        نسيت  كلمة المرور <a  href="<?php echo e(route('password.request')); ?>">استعاده</a>
                                         <?php endif; ?>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- End login  ====
        ======================================= -->


    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>