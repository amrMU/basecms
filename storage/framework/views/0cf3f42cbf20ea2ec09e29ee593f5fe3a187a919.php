<!-- =====================================
==== Start testim -->
<?php if($testmonials->count() > 0): ?>
<section class="testim section-padding bg-img" data-background="<?php echo e(asset('/front')); ?>/images/bg-dots.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 head">
                <h5>اراء العملاء</h5>
            </div>

            <div class="col-lg-12">
                <div class="clients-slider wow fadeInUp">
                    <?php $__currentLoopData = $testmonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_monial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="info">
                            <div class="img">
                                <img src="<?php echo e(asset('/')); ?><?php echo e(@$test_monial->image); ?>" alt="">
                            </div>
                            <h6><?php echo e(@$test_monial->title); ?></h6>
                        </div>
                        <div class="text"><?php echo e(@$test_monial->content); ?></div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- End testim ====
    ======================================= -->
    