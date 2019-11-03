<section class="testim section-padding bg-img" data-background="{{asset('/front')}}/images/bg-dots.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 head">
                <h5>اراء العملاء</h5>
            </div>

            <div class="col-lg-12">
                <div class="clients-slider wow fadeInUp">
                    @foreach($testmonials as $test_monial)
                    <div class="item">
                        <div class="info">
                            <div class="img">
                                <img src="{{asset('/')}}{{ @$test_monial->image }}" alt="">
                            </div>
                            <h6>{{ @$test_monial->title }}</h6>
                        </div>
                        <div class="text">{{ @$test_monial->content }}</div>
                    </div>
                    @endforeach
          
                </div>
            </div>
        </div>
    </div>
</section>