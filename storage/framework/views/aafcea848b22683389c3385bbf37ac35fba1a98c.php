<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
   
    <!-- Title  -->
    
    <?php echo $__env->yieldContent('meta_tags'); ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('/front/images/favicon.png')); ?>" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal:200,300,400,500,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo e(asset('/front')); ?>/css/plugins.css" />

    <!-- bootstrap-rtl.min -->
    <link rel="stylesheet" href="<?php echo e(asset('/front')); ?>/css/bootstrap-rtl.min.css" />

    <!-- Core Style Css -->
    <link rel="stylesheet" href="<?php echo e(asset('/front')); ?>/css/style.css" />

</head>

<body>

    <!-- =====================================
    	  ==== Start Loading -->

    <div class="loading valign">
        <div class="full-width">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- End Loading ====
        ======================================= -->



    <!-- =====================================
        ==== Start Navbar -->

    <div class="nav-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 right">
                    <div class="mnav">
                        <ul>
                            <li class="nvmenu">
                                <div class="logo">
                                    <?php if($setting->logo === null ): ?>
                                    <a href="<?php echo e(URL::to('/')); ?>"><img src="<?php echo e(asset('/front/images/logo.png')); ?>" alt=""></a>

                                    <?php else: ?> 
                                    <a href="<?php echo e(URL::to('/')); ?>"><img src="<?php echo e(asset('/').@$setting->logo); ?>" alt=""></a>
                                    <?php endif; ?>
                                </div>
                            </li>

                            <li class="nvmenu">
                                <a href="<?php echo e(URL::to('/')); ?>">الرئسية</a>
                            </li>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nvmenu">
                                <a href="<?php echo e(URL::to('/').'/categories/'.$category->id.'/'.str_replace(' ', '_', $category->category_translation->name)); ?>"><?php echo e(@$category->category_translation->name); ?> <?php if($category->sub_categories->count() > 0): ?><span class="ti-angle-down"></span><?php endif; ?></a>
                                <?php if($category->sub_categories->count() > 0): ?>
                                <ul class="menu">
                                    <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(URL::to('/').'/categories/'.$sub->id.'/'.str_replace(' ', '_', $sub->category_translation->name)); ?>"><?php echo e(@$sub->category_translation->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(Auth::check()): ?>
                            <li class="nvmenu">
                                <a href="">روابط خاصه<span class="ti-angle-down"></span></a>
                                <ul class="menu">
                                   
                                    <li><a href="<?php echo e(URL::to('/i/advertising/create')); ?>">اضافة اعلان</a></li>
                                    <li><a href="<?php echo e(URL::to('/i/profile')); ?>">الملف الشخصي</a></li>
                                    <li><a href="<?php echo e(URL::to('/logout')); ?>">تسجيل خروج</a></li>
                                </ul>

                            </li>
                            <?php endif; ?>
                            <li class="nvmenu">
                                <a href="">الصفحات<span class="ti-angle-down"></span></a>
                                <ul class="menu">
                                   <li><a href="<?php echo e(URL::to('/aboutus')); ?>">من نحن</a></li>
                                   <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(URL::to('/pages').'/'.@$page->id.'/'.@$page->url); ?>"><?php echo e(@$page->translation->title); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   <li><a href="<?php echo e(URL::to('/contactus')); ?>">اتصل بنا</a></li>
                                </ul>
                            </li>

                            <div class="clear-fix"></div>
                        </ul>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="clear-fix"></div>
                </div>

                <div class="col-lg-4 left">
                    <div class="user-area">
                        <ul>
                            <?php if(Auth::guest()): ?>
                            <li class="nav-user">
                                <a href="<?php echo e(URL::to('login')); ?>" class="butn butn-bg">
                                    <span>تسجيل دخول</span>
                                </a>
                            </li>
                            <li class="nav-user">
                                <a href="<?php echo e(URL::to('/register')); ?>" class="butn butn-bord">
                                    <span>حساب جديد</span>
                                </a>
                            </li>
                            <?php elseif(Auth::user()->type_user == 'admin'): ?>
                            <li class="nav-user">
                                <a href="<?php echo e(URL::to('ar/admin/home')); ?>" target="_blank" class="butn butn-bord">
                                    <span>لوحة التحكم</span>
                                </a>
                            </li>
                            <?php endif; ?>
                            <div class="clear-fix"></div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-mobile">
        <div class="container">
            <div class="row">
                <div class="col-6 right">
                    <div class="mnav-icon">
                        <ul>
                            <li>
                                <div class="nav-icon">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </li>
                            <li>
                                <div class="logo">
                                    <?php if(isset($setting)): ?>
                                    <?php if(isset($setting->logo)): ?>
                                    <a href="#0"><img src="<?php echo e(asset('/').@$setting->logo); ?>" alt=""></a>
                                    <?php else: ?>
                                    <a href="#0"><img src="<?php echo e(asset('/front/images/logo.png')); ?>" alt=""></a>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 left">
                    <div class="user-area">
                        <ul>
                            <li class="nav-user">
                                <a href="#0" class="butn butn-bg">
                                    <span>تسجيل دخول</span>
                                </a>
                            </li>
                            <li class="nav-user">
                                <a href="#0" class="butn butn-bord">
                                    <span>حساب جديد</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="colaps-menu">
            <div class="mnav">
                <ul>
                    <li class="nvmenu">
                        <a href="#0">الرئسية</a>
                    </li>

                    <li class="nvmenu">
                        <a href="#0">العقارات</a>
                    </li>

                    <li class="nvmenu">
                        <a href="#0" class="drop">الاماكن السياحيه <span class="ti-angle-down"></span></a>

                        <ul class="menu">
                            <li><a href="#0">سياحة</a></li>
                            <li><a href="#0">كافيهات</a></li>
                            <li><a href="#0">مطاعم</a></li>
                            <li><a href="#0">مولات</a></li>
                            <li><a href="#0">مراكز صحيه</a></li>
                        </ul>
                    </li>

                    <li class="nvmenu">
                        <a href="#0">فنادق وشقق</a>
                    </li>

                    <li class="nvmenu">
                        <a href="#0" class="drop">الخدمات العامة <span class="ti-angle-down"></span></a>

                        <ul class="menu">
                            <li><a href="#0">سباكه</a></li>
                            <li><a href="#0">كهربا</a></li>
                            <li><a href="#0">خدمات عامة</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- End Navbar ====
        ======================================= -->
        <?php echo $__env->yieldContent('content'); ?>
    <!-- =====================================
        ==== Start Footer -->

    <footer class="text-center bg-img" data-overlay-dark data-background="images/pattern-b.png">

        <div class="container">

            <a href="#home" class="totop ti-angle-double-up" data-scroll-nav="0"></a>

            <div class="social">
                <?php if(isset($setting)): ?>
                    <?php if(isset($setting->social_media_link)): ?>
                        <?php $__currentLoopData = $setting->social_media_link; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(@$link->url); ?>" class="icon">
                            <!-- <i class="fab fa-twitter"></i> -->
                            <img src="<?php echo e(URL::to('/').@$link->icon); ?>" title="<?php echo e(@$link->social_media_translation->name); ?>">
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- <a href="#0" class="icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#0" class="icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#0" class="icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#0" class="icon">
                    <i class="fab fa-behance"></i>
                </a>
                <a href="#0" class="icon">
                    <i class="fab fa-instagram"></i>
                </a> -->
            </div>

            <p>&copy; جميع الحقوق محفوظة - صمّم هذا الموقع من طرف alyomhost.</p>

        </div>
    </footer>

    <!-- End Footer ====
        ======================================= -->





    <!-- jQuery -->
    <script src="<?php echo e(asset('/front')); ?>/js/jquery-3.0.0.min.js"></script>
    <script src="<?php echo e(asset('/front')); ?>/js/jquery-migrate-3.0.0.min.js"></script>

    <!-- popper.min -->
    <script src="<?php echo e(asset('/front')); ?>/js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="<?php echo e(asset('/front')); ?>/js/bootstrap.min.js"></script>

    <!-- owl carousel -->
    <script src="<?php echo e(asset('/front')); ?>/js/owl.carousel.min.js"></script>

    <!-- parallaxie js -->
    <script src="<?php echo e(asset('/front')); ?>/js/parallaxie.js"></script>

    <!-- aos js -->
    <script src="<?php echo e(asset('/front')); ?>/js/wow.min.js"></script>

    <!-- jquery-ui  -->
    <script src="<?php echo e(asset('/front')); ?>/js/jquery-ui.js"></script>

    <!-- jquery.magnific-popup.min js -->
    <script src="<?php echo e(asset('/front')); ?>/js/jquery.magnific-popup.min.js"></script>

    <!-- slick.min js -->
    <script src="<?php echo e(asset('/front')); ?>/js/slick.min.js"></script>

    <!-- validator js -->
    <script src="<?php echo e(asset('/front')); ?>/js/validator.js"></script>

    <!-- custom scripts -->
    <script src="<?php echo e(asset('/front')); ?>/js/scripts.js"></script>

    <script>
        new WOW().init();
    </script>


    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [0, 500],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        });
    </script>
    <?php echo $__env->yieldContent('jsCode'); ?>


</body>

</html>