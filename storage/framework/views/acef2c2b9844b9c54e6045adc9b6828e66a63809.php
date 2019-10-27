<?php $__env->startSection('meta_tags'); ?>
    <title> لملف الشخصي| <?php echo e(@$setting->translation->title); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" <?php echo app('translator')->getFromJson('home.aboutus'); ?> | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/about_us')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="لملف الشخصي| | <?php echo e(@$setting->translation->title); ?>" />
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
                        <h1>حسابى</h1>
                        <h5><a href="index.html">الرئسية</a><span>/</span><a href="#0">حسابى</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start profile  -->

        <section class="profile section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="profile-user">
                            <div class="user-img">
                                <div class="img">
                                    <img id="blah" src="<?php echo e(asset('front/images/profile.jpg')); ?>" alt="">
                                </div>
                                <span class="icon"><i class="far fa-edit"></i></span>
                                <input type="file" name="pic" accept="image/*" onchange="readURL(this);">
                            </div>
                            <div class="user-info">
                                <ul>
                                    <li><span>الاسم : </span><?php echo e(@Auth::user()->fname.' '.@Auth::user()->fname); ?></li>
                                    <li><span>رقم الهاتف : </span> <?php echo e(@Auth::user()->phone); ?></li>
                                    
                                    <li><span>البريد الالكترونى : </span><?php echo e(@Auth::user()->email); ?></li>
                                </ul>
                                <div class="text-center">
                                    <a href="#0" class="butn butn-bg"><span>تعديل البيانات</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="user-activity">
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
                            <div class="tab-nav">
                                <ul class="tabs">
                                    <li class="tab-link current one" data-tab="tab-1">تعديل البيانات</li>
                                    <li class="tab-link two" data-tab="tab-2">المفضلة</li>
                                    <li class="tab-link three" data-tab="tab-3">إعلاناتى</li>
                                    <li><a href="<?php echo e(URL::to('/i/advertising/create')); ?>">اضافه اعلان</a></li>
                                </ul>
                            </div>

                            <div class="tab-cont">
                                <div id="tab-1" class="tab-content profile-edit current">
                                    <div class="form">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الاسم الاول</label>
                                                        <input type="text" name="user_firstname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الاسم الاخير</label>
                                                        <input type="text" name="user_lastname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الجنسية</label>
                                                        <select>
                                                            <option value="0">-- اختر --</option>
                                                            <option value="1">الفجيرة</option>
                                                            <option value="2">أبو ظبي</option>
                                                            <option value="3">شرم أبحر</option>
                                                            <option value="4">دومة الجندل</option>
                                                            <option value="5">وادي الطوقي</option>
                                                            <option value="6">دبي</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">رقم الهاتف</label>
                                                        <input type="text" name="user_phone">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <h6><span>بيانات الحساب</span></h6>

                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">البريد الالكترونى</label>
                                                        <input type="email" name="user_email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الرقم السرى</label>
                                                        <input type="text" name="user_pass">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <button type="submit" class="butn butn-bg"><span>حفظ</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-content favorites">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="<?php echo e(asset('front/images/1.jpg')); ?>" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="<?php echo e(asset('front/images/2.jpg')); ?>" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="<?php echo e(asset('front/images/3.jpg')); ?>" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="<?php echo e(asset('front/images/4.jpg')); ?>" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"> <img src="<?php echo e(asset('front/images/1.jpg')); ?>" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="<?php echo e(asset('front/images/2.jpg')); ?>" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-content myadd">
                                    <ul>
                                       <?php $__currentLoopData = Auth::user()->ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="img">
                                                <a href="#0"><img src="<?php echo e(asset('/').@$ad->images->first()->image); ?>" alt="<?php echo e(@$ad->translations->first()->title); ?>"></a>
                                            </div>
                                            <div class="info">
                                                <a href="#0">
                                                    <h6><?php echo e(@$ad->translations->first()->title); ?></h6>
                                                </a>
                                                <p><?php echo e(@$ad->translations->first()->address); ?></p>
                                            </div>
                                            <div class="edit">
                                                <a href="<?php echo e(URL::to('/').'/i/ads/'.@$ad->id.'/edit'); ?>"><span><i class="fas fa-pencil-alt"></i></span></a>
                                                <a href="<?php echo e(URL::to('/i/ads').'/'.@$ad->id.'/delete'); ?>"><span><i class="fas fa-trash-alt"></i></span></a>
                                            </div>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End profile  ====
        ======================================= -->


    </main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>