@extends('front.layouts.main')
@section('meta_tags')
    <title> اضافة اعلان | {{@$setting->translation->title}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" @lang('home.aboutus') | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/about_us')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content=" اضافة اعلان | {{@$setting->translation->title}}" />
    <meta name="twitter:site"content="@wait" />
@stop
@section('content')
 
 <main>

        <!-- =====================================
                ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="images/banner-1.jpg">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        @if($category->parent_id != NULL)
                        <h1> {{ @$category->category->category_translation->name }}</h1>
                        @else 
                        <h1> {{ @$category->category_translation->name }}</h1>
                        @endif
                        <h5>
                        <a href="{{ URL::to('/') }}">الرئسية</a>
                        <span>/</span>
                        @if($category->parent_id != NULL)
                        <a href="{{ URL::to('/').'/categories/'.$category->parent_id.'/'.@str_replace(' ', '_', $category->category->category_translation->name) }}">{{ @$category->category->category_translation->name}}</a>
                        <span>/</span>
                        @endif
                        <a href="">{{ @$category->category_translation->name }}</a>
                        </h5>
                    </div>
                    <div class="col-lg-10 offset-lg-1">
                        <div class="find-home">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-4 custom-padding">
                                            <div class="item">
                                                <div class="">
                                                    <select>
                                                        <option value="0">المدينة</option>
                                                        <option value="1">الفجيرة</option>
                                                        <option value="2">أبو ظبي</option>
                                                        <option value="3">شرم أبحر</option>
                                                        <option value="4">دومة الجندل</option>
                                                        <option value="5">وادي الطوقي</option>
                                                        <option value="6">دبي</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 custom-padding">
                                            <div class="item">
                                                <div class="">
                                                    <select>
                                                        <option value="0">الغرض</option>
                                                        <option value="1">بيع</option>
                                                        <option value="2">شراء</option>
                                                        <option value="3">تمليك</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 custom-padding">
                                            <div class="item">
                                                <div class="">
                                                    <select>
                                                        <option value="0">نوع العقار</option>
                                                        <option value="1">سكنى</option>
                                                        <option value="2">تجاري</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 custom-padding">
                                    <div class="find">
                                        <button>ابحث</button>
                                    </div>
                                </div>
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
                            <h5> <span></span>{{ @$category->category_translation->name }}</h5>
                        </div>

                        <div class="row">
                            @if($category->ads->count() > 0 )
                            @foreach($category->ads as $ad)
                            <div class="col-lg-3 col-md-6">
                                <div class="item">
                                    <div class="img">
                                        <img src="{{ asset('/').@$ad->images->first()->image }}" alt="">
                                        <span class="tag">{{ @$category->category_translation->name }}</span>
                                        <div class="icons">
                                            <a href="#0" class="icon"><span class="ti-gallery"></span></a>
                                            <a href="#0" class="icon"><span class="ti-heart"></span></a>
                                            <a href="#0" class="icon"><span class="ti-location-pin"></span></a>
                                        </div>
                                    </div>
                                    <div class="cont">
                                        <h5>{{ @$ad->translations->first()->title }}</h5>
                                        <p>{{ @$ad->translations->first()->address }}</p>
                                        <div class="info">
                                            <ul>
                                                @if($ad->space !== null)
                                                <li>
                                                    <span class="icon"><i class="fas fa-home"></i> مساحة  {{ @$ad->space }}</span>
                                                </li>
                                                @endif
                                                @if($ad->bed_room !== null)
                                                <li>
                                                    <span class="icon"><i class="fas fa-bed"></i> {{ @$ad->bed_room }} غرف نوم</span>
                                                </li>
                                                @endif
                                                @if($ad->bathroom !== null)
                                                <li>
                                                    <span class="icon"><i class="fas fa-bath"></i> {{ @$ad->bathroom }} حمام</span>
                                                </li>
                                                @endif
                                                @if($ad->parking !== null)
                                                <li>
                                                    <span class="icon"><i class="fas fa-car"></i> {{ @$ad->parking }} جراج</span>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="det">
                                            <h6 class="price"><span>{{ @$ad->price }}</span></h6>
                                            <a href="#0" class="more"><span>اعرف المزيد</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <p class="">لايوجد إعلانات بهذا القسم</p>
                            @endif

                    
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- End Featured  ====
            ======================================= -->



        <!-- =====================================
            ==== Start testim -->

        <section class="testim section-padding bg-img" data-background="images/bg-dots.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 head">
                        <h5>اراء العملاء</h5>
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
                                <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم
                                    ويتم وضع النصوص
                                    النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم
                                    ويتم وضع النصوص
                                    النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم
                                    ويتم وضع النصوص
                                    النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
                            </div>
                            <div class="item">
                                <div class="info">
                                    <div class="img">
                                        <img src="images/clients/2.png" alt="">
                                    </div>
                                    <h6>احمد ابراهيم</h6>
                                </div>
                                <div class="text">عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم
                                    ويتم وضع النصوص
                                    النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية.</div>
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