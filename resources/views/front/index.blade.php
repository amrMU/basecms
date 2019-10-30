@extends('front.layouts.main')
@section('meta_tags')
    <title>الصفحه الرئيسيه  | {{@$setting->translation->title}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" @lang('home.aboutus') | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/about_us')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="الصفحه الرئيسيه | {{@$setting->translation->title}}" />
    <meta name="twitter:site"content="@wait" />
@stop
@section('content')
    <!-- =====================================
        ==== Start Header -->

    <header id="home" class="header bg-img bg-fixed valign" data-overlay-dark="6" data-background="{{ asset('front/images/bg1.jpg') }}">

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center caption">
                    <h6>أفضل طريقة</h6>
                    <h1>للبحث عن منزلك المثالي</h1>
                </div>
            </div>

            <div class="icons">
                <ul>
                    <li><span class="icon flaticon-home-2"></span> شقق </li>
                    <li><span class="icon flaticon-hotel-2"></span> فنادق </li>
                    <li><span class="icon flaticon-sunbed"></span> شاليهات </li>
                    <li><span class="icon flaticon-home"></span> فيلات </li>
                    <li><span class="icon flaticon-hotel-1"></span> إداري </li>
                </ul>
            </div>
        </div>

        <div class="slideshow">
            <div class="slider">
                <div class="item bg-img bg-fixed" data-background="{{ asset('front/images/bg1.jpg') }}">
                </div>
                <div class="item bg-img bg-fixed" data-background="{{ asset('front/images/bg2.jpg') }}">
                </div>
                <div class="item bg-img bg-fixed" data-background="{{ asset('front/images/bg3.jpg') }}" data-overlay-dark="3">
                </div>
            </div>
        </div>

    </header>

    <!-- End Header ====
        ======================================= -->



    <!-- =====================================
        ==== Start Featured  -->
    @foreach($categories_has_ads as $cat_add)
    <section class="featured carousel-three section-padding bg-gray basic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="head">
                        <h5> <span></span>{{ @$cat_add->category_translation->name }}</h5>
                    </div>

                    <div class="owl-carousel owl-theme">
                        @foreach($cat_add->ads as $ad)
                        <div class="item">
                            <div class="img">
                                <img src="{{ asset('/').@$ad->images->first()->image }}" alt="">
                               
                                @include('front.tag')
                                <div class="icons">
                                     {{-- <a href="#0" class="icon"><span class="ti-gallery"></span></a> --}}
                                     @if(Auth::check())
                                        {{-- <small  data-ad-id="{{ @$ad->id }}" data-user-id="{{ @Auth::id() }}" class="icon fav">
                                            @if($ad->user_fav !== null)
                                            <i id="disLike" class="fas fa-heart"></i>
                                            @else
                                            <i id="like"    class="far fa-heart"></i>
                                            @endif
                                        </small> --}}
                                        <a href="{{ URL::to('/') }}/i/fav/{{ @$ad->id.'/'.@Auth::id() }}"  class="icon ">
                                             @if($ad->user_fav !== null)
                                            {{-- <span id="like" class="ti-heart"></span> --}}
                                            <i id="disLike" class="fas fa-heart"></i>
                                            @else
                                            <i id="like"    class="far fa-heart"></i>
                                            @endif

                                        </a>
                                        @else
                                        <a href="{{ URL::to('/login') }}"  class="icon "><span class="ti-heart"></span></a>

                                        @endif
                                </div>
                            </div>
                            <div class="cont">
                                <h5>{{ $ad->translations->first()->title }}</h5>
                                <p>{{ $ad->translations->first()->address }}</p>
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
                                    <a href="{{ URL::to('/').'/ads/'.@$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title) }}" class="more"><span>اعرف المزيد</span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                       
                    </div>

                </div>
            </div>
        </div>
    </section>
    @endforeach


    <!-- End Featured  ====
        ======================================= -->

@stop
@section('jsCode')
    <script>
        $('.fav').on('click',function () {
         
            var ad_id = $(this).attr('data-ad-id');
            var user_id = $(this).attr('data-user-id');
            console.log(ad_id);
                   // console.log(($user_id).children());
                   
                   // console.log($(this).child().attr('class'));

            $.ajax({
                'url' : '{{ URL::to('/') }}/api/i/fav/' + ad_id+'/'+user_id,
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
@stop