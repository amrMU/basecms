<?php $__env->startSection('meta_tags'); ?>
    <title> لملف الشخصي| <?php echo e(@Auth::user()->fname); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content="لملف الشخصي| <?php echo e(@Auth::user()->fname); ?>" />
    <meta property="og:url"content="<?php echo e(URL::to('/')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="لملف الشخصي| <?php echo e(@Auth::user()->fname); ?>" />
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
                        <h5><a href="<?php echo e(URL::to('/')); ?>">الرئسية</a><span>/</span><a href="#">حسابى</a></h5>
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
                                    <img id="blah" src="<?php echo e(asset('/').Auth::user()->image); ?>" alt="">
                                </div>
                             
                            </div>
                            <div class="user-info">
                                <ul>
                                    <li><span>الاسم : </span><?php echo e(@Auth::user()->fname.' '.@Auth::user()->lname); ?></li>
                                    <li><span>رقم الهاتف : </span> <?php echo e(@Auth::user()->phone); ?></li>
                                    <li><span>البريد الالكترونى : </span><?php echo e(@Auth::user()->email); ?></li>
                                </ul>
                             
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
                                        <form action="<?php echo e(url('i/update_profile')); ?>" method="post"  enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الاسم الاول</label>
                                                        <input type="text" name="fname" value="<?php echo e(Auth()->user()->fname); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الاسم الاخير</label>
                                                        <input type="text"  name="lname" value="<?php echo e(Auth()->user()->lname); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الجنسية</label>
                                                        <select name="country_id">
                                                            <option value="">-- اختر --</option>
                                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e(@$country->id); ?>" <?php if($country->id == Auth::user()->country_id): ?> selected <?php endif; ?>><?php echo e(@$country->translations->first()->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">رقم الهاتف</label>
                                                        <input type="text"  name="phone" value="<?php echo e(Auth()->user()->phone); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <h6><span>بيانات الحساب</span></h6>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">البريد الالكترونى</label>
                                                        <input type="email" name="email" value="<?php echo e(Auth()->user()->email); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">كلمة المرور</label>

                                                        <input type="password" name="password">
                                                        <br>
                                                         <small> - الأحرف الكبيرة الإنجليزية (A - Z) <br>- الأحرف الصغيرة الإنجليزية (a - z) <br>- الأساس 10 أرقام (0 - 9) <br>- غير الأبجدية الرقمية (على سبيل المثال:! ، $) </small>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">تأكيد كلمة المرور</label>
                                                        <input type="password" name="password_confirmation">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">صورة الملف الشخصصي</label>
                                                        <input type="file" name="image">
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
                                        <?php $__currentLoopData = Auth()->user()->fav_ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                     <img src="<?php echo e(asset('/').@$fav->ad->images->first()->image); ?>" alt="<?php echo e(@$fav->ad->translations->first()->title); ?>">
                                                </div>
                                                <div class="cont">
                                                    <a href="<?php echo e(URL::to('/').'/ads/'.$fav->ad_id.'/'.@str_replace(' ', '_', $fav->ad->translations->first()->title)); ?>" class="det" title="<?php echo e(@$fav->ad->translations->first()->title); ?>">
                                                        <?php echo e(@substr($fav->ad->translations->first()->title,0,33).'...'); ?>

                                                    </a>
                                                    <a href="<?php echo e(URL::to('/')); ?>/i/fav/<?php echo e(@$fav->ad_id.'/'.@Auth::id()); ?>"  class="icon ">
                                                     
                                                       <i id="disLike" class="fas fa-heart"></i>

                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  
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