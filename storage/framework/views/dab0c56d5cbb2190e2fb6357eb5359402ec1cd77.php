<?php $__env->startSection('meta_tags'); ?>
    <title> اضافة اعلان | <?php echo e(@$setting->translation->title); ?></title>

    <meta name='description' itemprop='description' content='<?php echo @$info->translation->content; ?>' />
    <meta name='keywords' content='<?php echo @$setting->meta_tags; ?>,<?php echo @$info->translation->title; ?>,<?php echo @$info->mission; ?>,<?php echo @$info->goals; ?>' />
    <meta property="og:description"content="<?php echo e(@$info->translation->content); ?>" />
    <meta property="og:title"content=" <?php echo app('translator')->getFromJson('home.aboutus'); ?> | <?php echo e(@$setting->translation->title); ?> " />
    <meta property="og:url"content="<?php echo e(URL::to('/about_us')); ?>" />
    <meta property="og:site_name"content="<?php echo e(@$setting->translation->title); ?>" />
    <meta property="og:image" content="<?php echo e(URL::to('/').@$setting->logo); ?>">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content=" اضافة اعلان | <?php echo e(@$setting->translation->title); ?>" />
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
                        <h1>إضافه اعلان</h1>
                        <h5><a href="<?php echo e(URL::to('/')); ?>">الرئيسيه</a><span>/</span><a href="#0">إضافه اعلان</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start vert  -->

        

        <!-- =====================================
        ==== Start addvert  -->

        <section class="advert section-padding">
            <div class="container">
                <div class="row">
                    <form  method="POST" action="<?php echo e(URL::to('/i/advertising')); ?>" enctype='multipart/form-data'>
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
                    <div class="col-lg-10 offset-lg-1">
                        <div class="content">

                            <div class="title">
                                <span><i>01 </i> أضف صوره</span>
                            </div>

                            <div class="upload-img">
                                <div class="img">
                                    <img id="blah" src="" alt="">
                                </div>
                                <div class="butn-upload valign">
                                    <div class="full-width">
                                        <div class="box">
                                            <span class="icon"><i class="far fa-image"></i></span>
                                            <input type="file" name="images[]" multiple="" accept="image/*" onchange="">
                                            <h6>اضف صوره للإعلان</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="title">
                                <span><i>02 </i> تفاصيل الإعلان</span>
                            </div>

                            <div class="details">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <select name="category_id" id="parent_id" class="form-control" >
                                                <option value=""><?php echo app('translator')->getFromJson('home.main_categories'); ?></option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option 
                                                value="<?php echo e(@$category->id); ?>"
                                                <?php if(isset($info)): ?>
                                                <?php if($category->id == $info->category->parent_id): ?>
                                                selected
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                >
                                                <?php echo e(@$category->category_translation->name); ?>

                                            </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                           <div class="alert alert-danger alert-dismissible" id="sub_categoris_unknown">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a><?php echo app('translator')->getFromJson('home.empty_sub_categories'); ?>
                                        </div>
                                        <div >
                                           <select name="sub_categoris" id="sub_categoris" class="form-control" >
                                            <option value=""><?php echo app('translator')->getFromJson('home.sub_categories'); ?></option>

                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="margin: 8px 0px 8px 0px">
                                         <select name="add_type" class="form-control" >
                                            <option value="own"  <?php if(Request::old('add_type') == "own"): ?> selected <?php endif; ?> >
                                             <?php echo app('translator')->getFromJson('home.own'); ?> </option>
                                            <option value="rent"  <?php if(Request::old('add_type') == "rent"): ?>selected  <?php endif; ?> >
                                                <?php echo app('translator')->getFromJson('home.rent'); ?>
                                            </option> 
                                            <option value="purchase" <?php if(Request::old('add_type') == "purchase"): ?>selected   <?php endif; ?>>
                                                    <?php echo app('translator')->getFromJson('home.purchase'); ?> 
                                            </option>
                                            <option value="other" <?php if(Request::old('add_type') == "other"): ?>selected <?php endif; ?>>
                                                <?php echo app('translator')->getFromJson('home.other'); ?> 
                                            </option>
                                           
                                        </select>
                                        </div>
                                    </div>
                                    <?php if($site_langs->count() > 0): ?>
                                    <?php $__currentLoopData = $site_langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <!-- categories input -->
                                    <input type="hidden" name="lang[]" value="<?php echo e(@$lang->id); ?>">
                                    <!-- title  input -->
                                     <div class="col-lg-12"  style="margin: 8px 0px 8px 0px">
                                            <input  type="text"
                                            name="title[]" 
                                            class="form-control" 
                                            placeholder="<?php echo app('translator')->getFromJson('home.title_'.@$lang->info->local); ?>" 
                                            <?php if(isset(Request::old('title')[$key])): ?>
                                            value="<?php echo e(Request::old('title')[$key]); ?>"
                                            <?php elseif(isset($info) != false): ?>
                                            value="<?php echo e(@$info->translations->where('lang_id',@$lang->id)->first()->title); ?> " 
                                            <?php endif; ?> >
                                    </div>
                                    <!-- /title  input -->
                                    <!-- address  input -->
                                    <div class="col-lg-12"  style="margin: 8px 0px 8px 0px">
                                        <input type="text" 
                                        name="address[]" 
                                        class="form-control" 
                                        placeholder="<?php echo app('translator')->getFromJson('home.location_'.@$lang->info->local); ?>" 
                                        value="<?php echo e(Request::old('address')[$key]); ?>">
                                    </div>
                                    <!-- /title  input -->
                                    
                                        <div class="col-lg-12"  style="margin: 8px 0px 8px 0px">
                                            <textarea name="content[]"
                                            id="editor1" 
                                            rows="4" 
                                            cols="4"  
                                            class="form-control" 
                                            placeholder="<?php echo app('translator')->getFromJson('home.content_'.@$lang->info->local); ?>"><?php echo e(Request::old('content')[$key]); ?></textarea>
                                        </div>

                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                               
                                <div class="col-lg-6"  style="margin: 8px 0px 8px 0px">
                                    <input type="text" 
                                    name="space" 
                                    class="form-control " 
                                    placeholder="<?php echo app('translator')->getFromJson('home.space'); ?>" 
                                    value="<?php echo e(Request::old('space')); ?>" >
                                </div>

                                <div class="col-lg-6"  style="margin: 8px 0px 8px 0px">
                                    <input type="text" 
                                    name="bed_room" 
                                    class="form-control" 
                                    placeholder="<?php echo app('translator')->getFromJson('home.bed_room'); ?>" 

                                    value="<?php echo e(Request::old('space')); ?>"  >
                                </div>
                                <!-- bathroom input -->
                                <div class="col-lg-6"  style="margin: 8px 0px 8px 0px">
                                    <input type="text" 
                                    name="bathroom" 
                                    class="form-control" 
                                    placeholder="<?php echo app('translator')->getFromJson('home.bathroom'); ?>" 
                                    value="<?php echo e(Request::old('bathroom')); ?>" 
                                     >
                                </div>
                                <!-- /bathroom input -->
                                <!-- parking input -->
                                   
                                <div class="col-lg-6"  style="margin: 8px 0px 8px 0px">
                                            <input type="text" 
                                            name="parking" 
                                            class="form-control" 
                                            placeholder="<?php echo app('translator')->getFromJson('home.parking'); ?>" 
                                            value="<?php echo e(Request::old('parking')); ?>" >
                                </div>
                                <!-- /parking input -->
                                <!-- /price input -->
                                <div class="col-lg-6">
                                    <input type="text" 
                                    name="price" 
                                    class="form-control"  
                                    placeholder="<?php echo app('translator')->getFromJson('home.price'); ?>" 
                                    value="<?php echo e(Request::old('price')); ?>">
                                </div>
                                <!-- /price input -->
                                <!-- /embedded_map input -->
                                <div class="col-lg-6">
                                    <input type="text" name="map" class="form-control"  placeholder="<?php echo app('translator')->getFromJson('home.embedded_map'); ?>" value="<?php echo @$info->map; ?>">
                                </div>
                                <!-- /embedded_map input -->
                            
                                    <div class="col-lg-12 text-center"  style="margin: 8px 0px 8px 0px">
                                        <button type="submit" class="butn butn-bg"><span>حفظ ونشر
                                                الاعلان</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- End addvert  ====
        ======================================= -->


        <!-- End vert  ====
        ======================================= -->


    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jsCode'); ?>
<script type="text/javascript">


//script getting sub categories fillter
$('#sub_categoris').show();

$('#sub_categoris_unknown').hide()
$('#parent_id').on('change',function () {
    // console.log($(this).val());

    if ($(this).val() != '') {
        var parent_id = $(this).val();
        $.ajax({
            'url' : '<?php echo e(URL::to('/')); ?>/api/categories/' + parent_id,
            'type' : 'GET',
            'success' : function(data) {     
               console.log(data.data.length );
                if (data.data.length == 0) {
                    $('#sub_categoris').fadeOut();
                    $('#sub_categoris_unknown').fadeIn();
                    console.log('empty');
                } //where sub categories list  length = 0
                else{//where sub categories list  length  > 0 will append in #sub_categoris

                    $('#sub_categoris').fadeIn();
                    $('#sub_categoris_unknown').fadeOut();
                    $('#sub_categoris').empty()
                    console.log('fully');

                    for (var i = data.data.length - 1; i >= 0; i--) {
                        $('#sub_categoris').append("<option value='"+data.data[i].id+"'>"+data.data[i].category_translation.name+"</option")   
                    }
                }   
            }//server success case 
            ,'error' : function(request,error)
            {
                $('#sub_categoris').fadeOut();
                $('#sub_categoris_unknown').fadeIn();
            }//server error case 
        });
    }else{
        $('#sub_categoris').fadeOut();
        $('#sub_categoris_unknown').fadeIn();
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>