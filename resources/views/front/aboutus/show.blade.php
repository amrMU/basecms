@extends('front.layouts.main')
@section('meta_tags')
    <title> من نحن | {{@$setting->translation->title}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" @lang('home.aboutus') | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/about_us')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content=" من نحن | {{@$setting->translation->title}}" />
    <meta name="twitter:site"content="@wait" />
@stop
@section('content')
    <main>

        <!-- =====================================
        ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="{{asset('/front')}}/images/banner-1.jpg">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        <h1> من نحن </h1>
                        <h5><a href="{{URL::To('/')}}">الرئسية</a><span>/</span><a href="#0">من نحن</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start about  -->

        <section class="about section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 valign">
                        <div class="intro">
                            <h6>{{@$info->translation->title}}</h6>
                            <p>{!!@$info->translation->content!!}</p>
                            <a href="#0" class="butn butn-bg"><span>اذهب للبحث</span></a>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="img">
                            <img src="{{asset('/')}}{{@$info->image}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 valign">
                        <div class="feat">
                            <ul>
                             <!--    <li><a href="#0"><span class="icon flaticon-home-2"></span> شقق </a></li>
                                <li><a href="#0"><span class="icon flaticon-hotel-2"></span> فنادق </a></li>
                                <li><a href="#0"><span class="icon flaticon-sunbed"></span> شاليهات </a></li>
                                <li><a href="#0"><span class="icon flaticon-home"></span> فيلات </a></li>
                                <li><a href="#0"><span class="icon flaticon-hotel-1"></span> إداري </a></li>
 -->
                                <li><span class="icon flaticon-home-2"></span> شقق </li>
                                <li><span class="icon flaticon-hotel-2"></span> فنادق </li>
                                <li><span class="icon flaticon-sunbed"></span> شاليهات </li>
                                <li><span class="icon flaticon-home"></span> فيلات </li>
                                <li><span class="icon flaticon-hotel-1"></span> إداري </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End about  ====
        ======================================= -->



        <!-- =====================================
        ==== Start blocks  -->

        <section class="blocks bg-img" data-background="{{asset('/front')}}/images/b1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 offset-lg-7 col-md-7 offset-md-5">
                        <div class="content">
                            <h5>مهمتنا</h5>
                            <div class="text" >{!!@$info->translation->mission!!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End blocks  ====
        ======================================= -->



        <!-- =====================================
        ==== Start numbers  -->

        <section class="numbers section-padding">
            <div class="container">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2>
                                <!-- <span class="icon hot-color flaticon-home-2"></span> -->
                                <img src="{{URL::to('/').@$category->icon}}">
                             3200 </h2>
                            <p>{{@$category->category_translation->name}}</p>
                        </div>
                    </div>
                    @endforeach
                   <!--  <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2><span class="icon third-color flaticon-sunbed"></span> 5738 </h2>
                            <p>أماكن مذهلة للزيارة</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2><span class="icon sub-color flaticon-slumber"></span> 4509 </h2>
                            <p>أماكن مذهلة للزيارة</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <h2><span class="icon main-color flaticon-hotel-1"></span> 3250 </h2>
                            <p>أماكن مذهلة للزيارة</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </section>

        <!-- End numbers  ====
        ======================================= -->



        <!-- =====================================
        ==== Start blocks  -->

        <section class="blocks b2 bg-img" data-background="{{asset('/front')}}/images/b2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-7">
                        <div class="content">
                            <h5>أهدافنا</h5>
                            <div class="text" >{!!@$info->translation->goals!!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End blocks  ====
        ======================================= -->


        @include('front.testmonials.show')

    </main>

@stop