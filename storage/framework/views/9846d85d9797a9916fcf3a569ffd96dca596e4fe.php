<?php $__env->startSection('meta_tags'); ?>
    <title><?php echo e(@$ad->translations->first()->title); ?>| <?php echo e(@$setting->translation->title); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" <?php echo app('translator')->getFromJson('home.aboutus'); ?> | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/').'/ads/'.$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title)); ?>" />
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
                            <a href="<?php echo e(URL::to('/')); ?>">الرئيسيه</a>
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
                                    <?php if($ad->images->count() > 0 ): ?>
                                        <?php $__currentLoopData = $ad->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item"><img src="<?php echo e(asset('/').$image->image); ?>" alt=""></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?> 
                                        <div class="item"><img src="<?php echo e(asset('/img/no_image.png')); ?>" alt=""></div>
                                    <?php endif; ?>
                                </div>
                                <div class="slider-nav">
                                    <?php $__currentLoopData = $ad->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item"><img src="<?php echo e(asset('/').$image->image); ?>" alt=""></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="title">
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
                                    <span class="share">
                                        <small>مشاركه : </small>
                                   
                                        <div id="social-links">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(URL::to('/').'/ads/'.$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title)); ?>" class="icon">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?text=hi&amp;url=<?php echo e(URL::to('/').'/ads/'.$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title)); ?>" class="icon">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                      
                                        <small><a href="#report" data-toggle="modal">ابلاغ عن الاعلان</a></small>
                                        <!-- Trigger the modal with a button -->
                                       
                                        <!-- Modal -->
                                        <div id="report" class="modal fade" role="dialog">
                                          <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h5 class="modal-title">هنا يمكنك الإبلاغ عن الإعلان مع ارفاق سبب الإبلاغ</h5>
                                              </div>
                                            <form action="<?php echo e(URL::to('ad/block'.'/'.@$ad->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                              <div class="modal-body">
                                                    <textarea name="message" class="form-control" cols="8" rows="8"><?php echo e(Request::old('message')); ?></textarea>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" >ارسال</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                                              </div>
                                            </form>
                                            </div>

                                          </div>
                                        </div>
                                    </span>
                                    <!-- <p>مارينا 5, مارينا, العلمين, الساحل الشمالي</p> -->
                                </div>

                            </div>

                            <div class="desc">
                                <div class="title">

                                </div>
                                <div class="title">
                                    <h5>الوصف</h5>
                                </div>
                                <div class="text"><?php echo @$ad->translations->first()->content; ?></div>
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
                                        <?php if($ad !== null): ?>
                                        <?php if($ad->user_id != Auth::id()): ?>
                                        <div class="title">
                                            <h5>اضافه تقييم</h5>
                                        </div>
                                        <form action="<?php echo e(URL::to('/do/rate').'/'.@$ad->id); ?>" method="post"  class="rate-form">
                                            <?php echo csrf_field(); ?>
                                           
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
                                            <div class="form-group">
                                                <input type="text" name="rate_title" placeholder="عنوان التقييم">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="rate_text" placeholder="كتابه تعليق"></textarea>
                                            </div>
                                            <button type="submit">ارسال</button>
                                        </form>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="map">
                                        <div class="title">
                                            <h5>المكان على الخريطة</h5>
                                        </div>
                                        <?php echo @$ad->map; ?>

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



        <?php echo $__env->make('front.ads.rates', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>