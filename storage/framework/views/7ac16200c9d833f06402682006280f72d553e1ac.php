<?php $__env->startSection('meta_tags'); ?>
    <title>الصفحه الرئيسيه  | <?php echo e(@$setting->translation->title); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" <?php echo app('translator')->getFromJson('home.aboutus'); ?> | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/about_us')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="الصفحه الرئيسيه | <?php echo e(@$setting->translation->title); ?>" />
    <meta name="twitter:site"content="@wait" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- =====================================
        ==== Start Header -->

    <header id="home" class="header bg-img bg-fixed valign" data-overlay-dark="6" data-background="<?php echo e(asset('front/images/bg1.jpg')); ?>">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center caption">
                    <h6>أفضل طريقة</h6>
                    <h1>للبحث عن منزلك المثالي</h1>
                </div>
            </div>

            <div class="icons">
                <ul>
                    <li><span class="icon flaticon-home-2"></span> شقق </li>
                    <li><span class="icon flaticon-hotel-2"></span> فنادق </li>
                    <li><span class="icon flaticon-sunbed"></span> شاليهات </li>
                    <li><span class="icon flaticon-home"></span> فيلات </li>
                    <li><span class="icon flaticon-hotel-1"></span> إداري </li>
                </ul>
            </div>
        </div>

        <div class="slideshow">
            <div class="slider">
                <div class="item bg-img bg-fixed" data-background="<?php echo e(asset('front/images/bg1.jpg')); ?>">
                </div>
                <div class="item bg-img bg-fixed" data-background="<?php echo e(asset('front/images/bg2.jpg')); ?>">
                </div>
                <div class="item bg-img bg-fixed" data-background="<?php echo e(asset('front/images/bg3.jpg')); ?>" data-overlay-dark="3">
                </div>
            </div>
        </div>

    </header>

    <!-- End Header ====
        ======================================= -->



    <!-- =====================================
        ==== Start Featured  -->
    <?php $__currentLoopData = $categories_has_ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_add): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <section class="featured carousel-three section-padding bg-gray basic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="head">
                        <h5> <span></span><?php echo e(@$cat_add->category_translation->name); ?></h5>
                    </div>

                    <div class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $cat_add->ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="img">
                                <img src="<?php echo e(asset('/').@$ad->images->first()->image); ?>" alt="">
                               
                                <?php echo $__env->make('front.tag', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <div class="icons">
                                     
                                    <?php if(Auth::check()): ?>
                                    <small  data-ad-id="<?php echo e(@$ad->id); ?>" data-user-id="<?php echo e(@Auth::id()); ?>" class="icon fav">
                                        <?php if($ad->user_fav !== null): ?>
                                        
                                        <i id="disLike" class="fas fa-heart"></i>
                                        <?php else: ?>
                                        <i id="like"    class="far fa-heart"></i>
                                        <?php endif; ?>

                                    </small>
                                    <?php else: ?>
                                    <a href="<?php echo e(URL::to('/login')); ?>"  class="icon "><span class="ti-heart"></span></a>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="cont">
                                <h5><?php echo e($ad->translations->first()->title); ?></h5>
                                <p><?php echo e($ad->translations->first()->address); ?></p>
                                <div class="info">
                                    <ul>
                                     <?php if($ad->space !== null): ?>
                                     <li>
                                        <span class="icon"><i class="fas fa-home"></i> مساحة  <?php echo e(@$ad->space); ?></span>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($ad->bed_room !== null): ?>
                                    <li>
                                        <span class="icon"><i class="fas fa-bed"></i> <?php echo e(@$ad->bed_room); ?> غرف نوم</span>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($ad->bathroom !== null): ?>
                                    <li>
                                        <span class="icon"><i class="fas fa-bath"></i> <?php echo e(@$ad->bathroom); ?> حمام</span>
                                    </li>
                                    <?php endif; ?>
                                    <?php if($ad->parking !== null): ?>
                                    <li>
                                        <span class="icon"><i class="fas fa-car"></i> <?php echo e(@$ad->parking); ?> جراج</span>
                                    </li>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="det">
                                    <h6 class="price"><span><?php echo e(@$ad->price); ?></span></h6>
                                    <a href="<?php echo e(URL::to('/').'/ads/'.@$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title)); ?>" class="more"><span>اعرف المزيد</span></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                       
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!-- End Featured  ====
        ======================================= -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jsCode'); ?>
    <script>
        $('.fav').on('click',function () {
         
            var ad_id = $(this).attr('data-ad-id');
            var user_id = $(this).attr('data-user-id');
            console.log(ad_id);
                   // console.log(($user_id).children());
                   
                   // console.log($(this).child().attr('class'));

            $.ajax({
                'url' : '<?php echo e(URL::to('/')); ?>/api/i/fav/' + ad_id+'/'+user_id,
                'type' : 'post',
                'success' : function(data) {     
                   console.log(data);
                   if (data.message == 'UnFav') {
                        $(this.children(1).hide());
                        $(this.children(2).sohow());
                   }else{
                      $(this.children(1).sohow());
                      $(this.children(2).hide());

                   }
                   console.log(data.message == 'UnFav');
                   console.log(data.message );
                      
                }//server success case 
                ,'error' : function(request,error)
                {
                  
                }//server error case 
            });


        });    
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>