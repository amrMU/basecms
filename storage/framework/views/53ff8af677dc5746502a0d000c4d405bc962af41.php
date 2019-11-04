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
                        <h1>حساب جديد</h1>
                        <h5><a href="<?php echo e(URL::to('/')); ?>">الرئسية</a><span>/</span><a href="#0">إنشاء حساب</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->


        
        <!-- =====================================
        ==== Start register  -->

        <section class="register section-padding">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <?php if($policy != null): ?>
                            <div class="col-lg-4 order-1">
                                <div class="register-info">
                                    <h5 class="title"><span>تعليمات التسجيل</span></h5>
                                    <div class="cont">
                                       
                                        <?php echo @$policy->translation->content; ?>

                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="col-lg-8 order-2">
                                <div class="register-form">
                                    <h5 class="title"><span>إنشاء حساب</span></h5>
                                    <form method="POST" action="<?php echo e(route('register')); ?>">
                                    <?php echo csrf_field(); ?>
                                     <?php if(Session('success')): ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong><?php echo app('translator')->getFromJson('home.success'); ?>!</strong> <?php echo e(session('success')); ?>.
                                        </div>
                                        <?php endif; ?>            
                                        <?php if($errors->any()): ?>
                                        <div class="alert alert-danger">
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input  type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="اسم المستخدم" required autofocus>
                                            </div>
                                            <div class="col-md-12">
                                                <input  type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required 
                                                    placeholder="البريد الالكترونى">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control" name="password" required placeholder="كلمة المرور">
                                            </div>
                                            <div class="col-md-12">
                                                <input  type="password" class="form-control" name="password_confirmation" required placeholder="تأكيد كلمة المرور">
                                            </div>
                                            <div class="text hvcont">
                                                <input type="checkbox" name="terms" style="float: right; width: auto; margin-top: 10px; margin-left: 10px;"> 
                                                اقر بالموافقه علي  <a href="<?php echo e(url('/').'/pages/'.@$policy->id.'/'.@$policy->url); ?>">شروط  الاستخدام </a>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" >إنشاء حساب</button>
                                            </div>
                                        </div>

                                    </form>
                                   
                                    <div class="text hvcont">
                                        هل لديك حساب؟ <a href="<?php echo e(route('login')); ?>">سجّل الدخول</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- End register  ====
        ======================================= -->


    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>