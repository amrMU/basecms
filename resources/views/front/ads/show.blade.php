@extends('front.layouts.main')
@section('meta_tags')
    <title>{{ @$ad->translations->first()->title }}| {{@$setting->translation->title}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" @lang('home.aboutus') | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{ URL::to('/').'/ads/'.$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title) }}" />
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
                            <a href="{{ URL::to('/') }}">الرئيسيه</a>
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
                                    @if($ad->images->count() > 0 )
                                        @foreach($ad->images as $image)
                                            <div class="item"><img src="{{ asset('/').$image->image }}" alt=""></div>
                                        @endforeach
                                    @else 
                                        <div class="item"><img src="{{ asset('/img/no_image.png')}}" alt=""></div>
                                    @endif
                                </div>
                                <div class="slider-nav">
                                    @foreach($ad->images as $image)
                                    <div class="item"><img src="{{ asset('/').$image->image }}" alt=""></div>
                                    @endforeach
                                </div>
                                <div class="title">
                                    <span class="share">
                                        <small>مشاركه : </small>
                                   
                                        <div id="social-links">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ URL::to('/').'/ads/'.$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title) }}" class="icon">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet?text=hi&amp;url={{ URL::to('/').'/ads/'.$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title) }}" class="icon">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                      {{--   <a href="#0" class="icon">
                                            <i class="fab fa-instagram"></i>
                                        </a> --}}
                                        <small><a href="#">ابلاغ عن الاعلان</a></small>
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
                                <div class="text">{!! @$ad->translations->first()->content !!}</div>
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
                                        @if($ad !== null)
                                        @if($ad->user_id != Auth::id())
                                        <div class="title">
                                            <h5>اضافه تقييم</h5>
                                        </div>
                                        <form action="{{ URL::to('/do/rate').'/'.@$ad->id }}" method="post"  class="rate-form">
                                            @csrf
                                            @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger alert-dismissible">
                                                {{ $error }}
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            </div>
                                            @endforeach
                                            @endif
                                            @if(Session::has('success'))
                                            <div class="alert alert-success alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('success') }}
                                            </div>
                                            @endif
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
                                        @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="map">
                                        <div class="title">
                                            <h5>المكان على الخريطة</h5>
                                        </div>
                                        {!! @$ad->map !!}
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



        @include('front.ads.rates')

    </main>

@stop
