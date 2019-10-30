<?php $__env->startSection('meta_tags'); ?>
    <title> اتصل بنا | <?php echo e(@$category->category_translation->name); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" اتصل بنا  | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/about_us')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="  اتصل بنا |  <?php echo e(@$category->category_translation->name); ?>" />
    <meta name="twitter:site"content="@wait" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
    <main>

        <!-- =====================================
        ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="<?php echo e(asset('front/images/banner-1.jpg')); ?>">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        <h1> اتصل بنا </h1>
                        <h5><a href="<?php echo e(url('/')); ?>">الرئسية</a><span>/</span><a href="#">اتصل بنا</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start Contact  -->

        <section class="contact section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 offset-lg-1">
                        <div class="contact-info">
                            <div class="row">
                                <?php $__currentLoopData = $setting->address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4">
                                    <div class="item">
                                        <span class="icon ti-map-alt"></span>
                                        <div class="cont">
                                            <h6><?php echo e(@$address->address_ar); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $setting->phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4" title="رقم الهاتف" >
                                    <div class="item">
                                        <span class="icon ti-mobile"></span>
                                        <div class="cont">
                                            <h6><?php echo e(@$phone->phone); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $setting->whatsapp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $whatsapp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4" title="واتساب">
                                    <div class="item">
                                        <span class="icon ti-themify-favicon-alt"></span>
                                        <div class="cont">
                                            <h6><?php echo e(@$whatsapp->whatsapp); ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $setting->emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4">
                                    <div class="item">
                                        <span class="icon ti-email"></span>
                                        <div class="cont">
                                            <h6><?php echo e(@$email->email); ?> - <?php echo e(@$email->department); ?></h6>
                                        </div> 
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                        <div class="contact-form">
                            <h5 class="title"><span>ارسل رساله</span></h5>
                            <form action="<?php echo e(url('/contactus')); ?>" method="post">
                               <?php echo csrf_field(); ?>
                               <?php if($errors->any()): ?>
                               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <div class="alert alert-danger alert-dismissible">
                                    <?php echo e($error); ?>

                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo e(Session::get('success')); ?>

                                </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" value="<?php echo e(Request::old('name')); ?>" placeholder="الاسم بالكامل">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" value="<?php echo e(Request::old('email')); ?>" id="" placeholder="البريد الالكترونى">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="subject" value="<?php echo e(Request::old('subject')); ?>"  placeholder="الموضوع">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" value="<?php echo e(Request::old('phone')); ?>" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="message" id="" placeholder="رسالتك"> <?php echo e(Request::old('message')); ?> </textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit">ارسال</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Contact  ====
        ======================================= -->


    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>