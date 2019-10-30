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
                            <?php $__currentLoopData = $ad->rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="<?php echo e(asset('/').@$rate->user->image); ?>" alt="">
                                    </div>
                                    <h6><?php echo e(@$rate->user->fname.' '.@$rate->user->lname); ?></h6>
                                    <h6><?php echo e(@$rate->title); ?></h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <?php if($rate->rate == 1): ?>
                                            <i class="fas fa-star"></i>
                                            <?php elseif($rate->rate == 2): ?>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <?php elseif($rate->rate == 3): ?>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <?php elseif($rate->rate == 4): ?>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <?php elseif($rate->rate == 5): ?>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="text"><?php echo e(@$rate->content); ?></div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End testim ====
            ======================================= -->

