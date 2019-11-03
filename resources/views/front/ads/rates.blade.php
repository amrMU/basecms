     <!-- =====================================
        ==== Start testim -->
    @if($ad->rates->count() > 0 )
        <section class="testim section-padding bg-img" data-background="images/bg-dots.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 head">
                        <h5>اهم التقيمات</h5>
                    </div>

                    <div class="col-lg-12">
                        <div class="clients-slider wow fadeInUp">
                            @foreach($ad->rates as $rate)
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="{{ asset('/').@$rate->user->image}}" alt="">
                                    </div>
                                    <h6>{{ @$rate->user->fname.' '.@$rate->user->lname  }}</h6>
                                    <h6>{{ @$rate->title  }}</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            @if($rate->rate == 1)
                                            <i class="fas fa-star"></i>
                                            @elseif($rate->rate == 2)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            @elseif($rate->rate == 3)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            @elseif($rate->rate == 4)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            @elseif($rate->rate == 5)
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="text">{{ @$rate->content  }}</div>
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- End testim ====
            ======================================= -->

