@extends('front.layouts.main')
@section('meta_tags')
    <title>{{ @$ad->translations->first()->title }}| {{@$setting->translation->title}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" @lang('home.aboutus') | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/about_us')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="{{ URL::to('/').'/ads/'.$ad->id.'/'.@$ad->translations->first()->title }}| {{@$setting->translation->title}}" />
    <meta name="twitter:site"content="@wait" />
@stop
@section('content')

    <main>

        <!-- =====================================
        ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="{{ asset('front/images/banner-1.jpg') }}">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        <h1> تفاصيل الإعلان </h1>
                        <h5>
                            <a href="{{ URL::to('/') }}">الرئسية</a>
                            <span>/</span>
                            @if($ad->category->parent_id != NULL)
                            <a href="{{ URL::to('/').'/categories/'.$ad->category->category->id.'/'.str_replace(' ', '_', $ad->category->category->category_translation->name) }}">{{ @$ad->category->category->category_translation->name }}</a> 
                            <span>/</span>
                            @endif
                            <a href="{{ URL::to('/').'/categories/'.$ad->category->id.'/'.str_replace(' ', '_', $ad->category->category_translation->name) }}">{{ $ad->category->category_translation->name }}</a>
                            <span>/</span>
                            <a href="#">{{ $ad->translations->first()->title }}</a>
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
                                    <h5>{{ $ad->translations->first()->title }} <span class="price">{{ @$ad->price }}</span> </h5>
                                    <p>{{ $ad->translations->first()->address }}</p>
                                </div>
                                <div class="slider-for">
                                    @foreach($ad->images as $image)
                                    <div class="item"><img src="{{ asset('/').$image->image }}" alt=""></div>
                                    @endforeach
                                </div>
                                <div class="slider-nav">
                                    @foreach($ad->images as $image)
                                    <div class="item"><img src="{{ asset('/').$image->image }}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="desc">
                                <div class="title">
                                    <h5>الوصف</h5>
                                </div>
                                <div class="text">{{ @$ad->translations->first()->content }}</div>
                            </div>

                            <div class="detl">
                                <div class="title">
                                    {{-- <h5>التفاصيل</h5> --}}
                                </div>
                                <div class="tabl">
                                    <ul class="head">
                                        @if($ad->space !== null)        
                                        <li>مساحة </li>
                                        @endif
                                        @if($ad->bed_room !== null)        
                                        <li>غرف نوم</li>
                                        @endif
                                        @if($ad->bathroom !== null)
                                        <li>حمام</li>
                                        @endif
                                        @if($ad->parking !== null)
                                        <li>جراج</li>
                                        @endif
                                    </ul>
                                    <ul class="tbod">
                                        @if($ad->space !== null)        
                                        <li>{{ @$ad->space }} </li>
                                        @endif
                                        @if($ad->bed_room !== null)        
                                        <li>{{ @$ad->bed_room }}</li>
                                        @endif
                                        @if($ad->bathroom !== null)
                                        <li>{{ @$ad->bathroom }}</li>
                                        @endif
                                        @if($ad->parking !== null)
                                        <li>{{ @$ad->parking  }}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="rate">
                                        <div class="title">
                                            <h5>اضافه تقييم</h5>
                                        </div>
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
                                        <form action="">
                                            <div class="form-group">
                                                <input type="text" name="rate_title" placeholder="عنوان التقييم">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="rate_text" placeholder="كتابه تعليق"></textarea>
                                            </div>
                                            <button type="submit">ارسال</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="map">
                                        <div class="title">
                                            <h5>المكان على الخريطة</h5>
                                        </div>
                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d950654.0413908078!2d39.77164582960116!3d21.449189838002464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2z2KzYr9ipINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1568626971878!5m2!1sar!2seg"
                                            width="100%" height="450" frameborder="0" style="border:0;"
                                            allowfullscreen=""></iframe>
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
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/1.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من
                                        التصميم
                                        ويتم وضع النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من
                                        التصميم
                                        ويتم وضع النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من
                                        التصميم
                                        ويتم وضع النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">
                                    <div class="rate">
                                        <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </div>
                                    <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من
                                        التصميم
                                        ويتم وضع النصوص
                                        النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End testim ====
            ======================================= -->



    </main>

@stop
