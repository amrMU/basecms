@extends('front.layouts.main')
@section('meta_tags')
    <title> قسم  | {{@$category->category_translation->name}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" @lang('home.aboutus') | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/about_us')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content=" قسم  | {{@$category->category_translation->name}}" />
    <meta name="twitter:site"content="@wait" />
@stop
@section('content')
 
 <main>

        <!-- =====================================
                ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="{{ URL::to('front/images/banner-1.jpg') }}">

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
                                        <img src="{{ asset('/').@$ad->images->first()->image }}" alt="{{ @$ad->translations->first()->title }}">
                                        <span class="tag">{{ @$category->category_translation->name }}</span>
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
                                            {{-- <a href="#0" class="icon"><span class="ti-location-pin"></span></a> --}}
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
                                            <a href="{{ URL::to('/').'/ads/'.$ad->id.'/'.@str_replace(' ', '_', $ad->translations->first()->title) }}" class="more"><span>اعرف المزيد</span></a>
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
        @include('front.testmonials.show')

        <!-- End testim =========================================== -->
    </main>
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