<?php $__env->startSection('meta_tags'); ?>
    <title><?php echo e(@$ad->translations->first()->title); ?>| <?php echo e(@$setting->translation->title); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" <?php echo app('translator')->getFromJson('home.aboutus'); ?> | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/about_us')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="<?php echo e(URL::to('/').'/ads/'.$ad->id.'/'.@$ad->translations->first()->title); ?>| <?php echo e(@$setting->translation->title); ?>" />
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
                        <h1> تفاصيل الإعلان </h1>
                        <h5>
                            <a href="<?php echo e(URL::to('/')); ?>">الرئسية</a>
                            <span>/</span>
                            <?php if($ad->category->parent_id != NULL): ?>
                            <a href="<?php echo e(URL::to('/').'/categories/'.$ad->category->category->id.'/'.str_replace(' ', '_', $ad->category->category->category_translation->name)); ?>"><?php echo e(@$ad->category->category->category_translation->name); ?></a> 
                            <span>/</span>
                            <?php endif; ?>
                            <a href="<?php echo e(URL::to('/').'/categories/'.$ad->category->id.'/'.str_replace(' ', '_', $ad->category->category_translation->name)); ?>"><?php echo e($ad->category->category_translation->name); ?></a>
                            <span>/</span>
                            <a href="#"><?php echo e($ad->translations->first()->title); ?></a>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start details  -->

        <section class="details section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="block">
                            <div class="img">
                                <div class="title">
                                    <h5><?php echo e($ad->translations->first()->title); ?> <span class="price"><?php echo e(@$ad->price); ?></span> </h5>
                                    <p><?php echo e($ad->translations->first()->address); ?></p>
                                </div>
                                <div class="slider-for">
                                    <?php $__currentLoopData = $ad->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item"><img src="<?php echo e(asset('/').$image->image); ?>" alt=""></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="slider-nav">
                                    <?php $__currentLoopData = $ad->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item"><img src="<?php echo e(asset('/').$image->image); ?>" alt=""></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            <div class="desc">
                                <div class="title">
                                    <h5>الوصف</h5>
                                </div>
                                <div class="text"><?php echo e(@$ad->translations->first()->content); ?></div>
                            </div>

                            <div class="detl">
                                <div class="title">
                                    
                                </div>
                                <div class="tabl">
                                    <ul class="head">
                                        <?php if($ad->space !== null): ?>        
                                        <li>مساحة </li>
                                        <?php endif; ?>
                                        <?php if($ad->bed_room !== null): ?>        
                                        <li>غرف نوم</li>
                                        <?php endif; ?>
                                        <?php if($ad->bathroom !== null): ?>
                                        <li>حمام</li>
                                        <?php endif; ?>
                                        <?php if($ad->parking !== null): ?>
                                        <li>جراج</li>
                                        <?php endif; ?>
                                    </ul>
                                    <ul class="tbod">
                                        <?php if($ad->space !== null): ?>        
                                        <li><?php echo e(@$ad->space); ?> </li>
                                        <?php endif; ?>
                                        <?php if($ad->bed_room !== null): ?>        
                                        <li><?php echo e(@$ad->bed_room); ?></li>
                                        <?php endif; ?>
                                        <?php if($ad->bathroom !== null): ?>
                                        <li><?php echo e(@$ad->bathroom); ?></li>
                                        <?php endif; ?>
                                        <?php if($ad->parking !== null): ?>
                                        <li><?php echo e(@$ad->parking); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="rate">
                                        <div class="title">
                                            <h5>اضافه تقييم</h5>
                                        </div>
                                        <div class="add-rate">
                                            <h6>التقييم :
                                                <span>
                                                    <input type="radio" id="star5" name="rate" value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="rate" value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="rate" value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="rate" value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="rate" value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </span>
                                            </h6>
                                        </div>
                                        <form action="">
                                            <div class="form-group">
                                                <input type="text" name="rate_title" placeholder="عنوان التقييم">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="rate_text" placeholder="كتابه تعليق"></textarea>
                                            </div>
                                            <button type="submit">ارسال</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="map">
                                        <div class="title">
                                            <h5>المكان على الخريطة</h5>
                                        </div>
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d950654.0413908078!2d39.77164582960116!3d21.449189838002464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2z2KzYr9ipINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1568626971878!5m2!1sar!2seg"
                                            width="100%" height="450" frameborder="0" style="border:0;"
                                            allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End details  ====
        ======================================= -->



        <!-- =====================================
        ==== Start testim -->

        <section class="testim section-padding bg-img" data-background="images/bg-dots.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 head">
                        <h5>اهم التقيمات</h5>
                    </div>

                    <div class="col-lg-12">
                        <div class="clients-slider wow fadeInUp">
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/1.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من
                                        التصميم
                                        ويتم وضع النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من
                                        التصميم
                                        ويتم وضع النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من
                                        التصميم
                                        ويتم وضع النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من
                                        التصميم
                                        ويتم وضع النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End testim ====
            ======================================= -->



    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>