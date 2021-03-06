<?php $__env->startSection('meta_tags'); ?>
    <title> قسم  | <?php echo e(@$category->category_translation->name); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" <?php echo app('translator')->getFromJson('home.aboutus'); ?> | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/about_us')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content=" قسم  | <?php echo e(@$category->category_translation->name); ?>" />
    <meta name="twitter:site"content="@wait" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
 
 <main>

        <!-- =====================================
                ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="<?php echo e(URL::to('front/images/banner-1.jpg')); ?>">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        <?php if($category->parent_id != NULL): ?>
                        <h1> <?php echo e(@$category->category->category_translation->name); ?></h1>
                        <?php else: ?> 
                        <h1> <?php echo e(@$category->category_translation->name); ?></h1>
                        <?php endif; ?>
                        <h5>
                        <a href="<?php echo e(URL::to('/')); ?>">الرئيسيه</a>
                        <span>/</span>
                        <?php if($category->parent_id != NULL): ?>
                        <a href="<?php echo e(URL::to('/').'/categories/'.$category->parent_id.'/'.@str_replace(' ', '_', $category->category->category_translation->name)); ?>"><?php echo e(@$category->category->category_translation->name); ?></a>
                        <span>/</span>
                        <?php endif; ?>
                        <a href=""><?php echo e(@$category->category_translation->name); ?></a>
                        </h5>
                    </div>
                    <div class="col-lg-10 offset-lg-1">
                        <div class="find-home">
                            <div class="row">
                                <div class="col-md-10">
                                    <form method="GET" action="<?php echo e(URL::to('/search'.'/'.@$category->id)); ?>">
                                        <?php echo csrf_field(); ?>
                                    <div class="row">
                                    
                                        <div class="col-md-5 col-sm-6 custom-padding">
                                            <div class="item">
                                                <div class="">
                                                    <select class="form-control" name="type_ad">
                                                        <option value="">الغرض</option>

                                                        <option value="own"><?php echo app('translator')->getFromJson('home.own'); ?></option>
                                                        <option value="rent"><?php echo app('translator')->getFromJson('home.rent'); ?></option>
                                                        <option value="purchase"><?php echo app('translator')->getFromJson('home.purchase'); ?></option>
                                                        <option value="other"><?php echo app('translator')->getFromJson('home.other'); ?></option>

                                                         
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($category->sub_categories->count()> 0): ?>
                                        <div class="col-md-5 col-sm-6 custom-padding">
                                            <div class="item">
                                                <div class="">
                                                    <select class="form-control" name="category_id">

                                                        
                                                        <?php $__currentLoopData = $category->sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e(@$sub->id); ?>"><?php echo e(@$sub->translations->first()->name); ?></option>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-2 custom-padding">
                                    <div class="find">
                                        <button>ابحث</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
                ======================================= -->



        <!-- =====================================
        ==== Start Featured  -->

        <section class="featured columns section-padding bg-gray">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="head">
                            <h5> <span></span><?php echo e(@$category->category_translation->name); ?></h5>
                        </div>

                        <div class="row">
                            <?php if($category->ads->count() > 0 ): ?>
                            <?php $__currentLoopData = $category->ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="item">
                                    <div class="img">
                                       
                                        <?php if($ad->images->count() > 0 ): ?>
                                        <img src="<?php echo e(asset('/').@$ad->images->first()->image); ?>" alt="">
                                        <?php else: ?> 
                                        <img src="<?php echo e(asset('/img/no_image.png')); ?>" alt="">
                                        <?php endif; ?>
                                        <span class="tag"><?php echo e(@$category->category_translation->name); ?></span>
                                        <div class="icons">
                                            
                                            <?php if(Auth::check()): ?>
                                            
                                            <a href="<?php echo e(URL::to('/')); ?>/i/fav/<?php echo e(@$ad->id.'/'.@Auth::id()); ?>"  class="icon ">
                                                 <?php if($ad->user_fav !== null): ?>
                                                
                                                <i id="disLike" class="fas fa-heart"></i>
                                                <?php else: ?>
                                                <i id="like"    class="far fa-heart"></i>
                                                <?php endif; ?>

                                            </a>
                                            <?php else: ?>
                                            <a href="<?php echo e(URL::to('/login')); ?>"  class="icon "><span class="ti-heart"></span></a>

                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <h5><?php echo e(@$ad->translations->first()->title); ?></h5>
                                        <p><?php echo e(@$ad->translations->first()->address); ?></p>
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
                                            <a href="<?php echo e(URL::to('/').'/ads/'.$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title)); ?>" class="more"><span>اعرف المزيد</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p class="">لايوجد إعلانات بهذا القسم</p>
                            <?php endif; ?>

                    
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- End Featured  ====
            ======================================= -->

        <!-- =====================================
            ==== Start testim -->
        <?php echo $__env->make('front.testmonials.show', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- End testim =========================================== -->
    </main>
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