@extends('front.layouts.main')
@section('meta_tags')
    <title> لملف الشخصي| {{@Auth::user()->fname}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content="لملف الشخصي| {{@Auth::user()->fname}}" />
    <meta property="og:url"content="{{URL::to('/')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="لملف الشخصي| {{@Auth::user()->fname}}" />
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
                        <h1>حسابى</h1>
                        <h5><a href="{{ URL::to('/') }}">الرئيسيه</a><span>/</span><a href="#">حسابى</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start profile  -->

        <section class="profile section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="profile-user">
                            <div class="user-img">
                                <div class="img">
                                    <img id="blah" src="{{ asset('/').Auth::user()->image }}" alt="">
                                </div>
                             
                            </div>
                            <div class="user-info">
                                <ul>
                                    <li><span>الاسم : </span>{{ @Auth::user()->fname.' '.@Auth::user()->lname }}</li>
                                    <li><span>رقم الهاتف : </span> {{ @Auth::user()->phone }}</li>
                                    <li><span>البريد الالكترونى : </span>{{ @Auth::user()->email }}</li>
                                </ul>
                             {{--    <div class="text-center">
                                    <a href="#0" class="butn butn-bg"><span>تعديل البيانات</span></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="user-activity">
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
                            <div class="tab-nav">
                                <ul class="tabs">
                                    <li class="tab-link current one" data-tab="tab-1">تعديل البيانات</li>
                                    <li class="tab-link two" data-tab="tab-2">المفضلة</li>
                                    <li class="tab-link three" data-tab="tab-3">إعلاناتى</li>
                                    <li><a href="{{ URL::to('/i/advertising/create') }}">اضافه اعلان</a></li>
                                </ul>
                            </div>

                            <div class="tab-cont">
                             
                                <div id="tab-1" class="tab-content profile-edit current">
                                    <div class="form">
                                        <form action="{{ url('i/update_profile') }}" method="post"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الاسم الاول</label>
                                                        <input type="text" name="fname" value="{{ Auth()->user()->fname }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الاسم الاخير</label>
                                                        <input type="text"  name="lname" value="{{ Auth()->user()->lname }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الجنسية</label>
                                                        <select name="country_id">
                                                            <option value="">-- اختر --</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{ @$country->id }}" @if($country->id == Auth::user()->country_id) selected @endif>{{ @$country->translations->first()->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">رقم الهاتف</label>
                                                        <input type="text"  name="phone" value="{{ Auth()->user()->phone }}">
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <h6><span>بيانات الحساب</span></h6>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">البريد الالكترونى</label>
                                                        <input type="email" name="email" value="{{ Auth()->user()->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">كلمة المرور</label>

                                                        <input type="password" name="password">
                                                        <br>
                                                         <small> - الأحرف الكبيرة الإنجليزية (A - Z) <br>- الأحرف الصغيرة الإنجليزية (a - z) <br>- الأساس 10 أرقام (0 - 9) </small>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">تأكيد كلمة المرور</label>
                                                        <input type="password" name="password_confirmation">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">صورة الملف الشخصصي</label>
                                                        <input type="file" name="image">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-center">
                                                    <button type="submit" class="butn butn-bg"><span>حفظ</span></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div id="tab-2" class="tab-content favorites">
                                    <div class="row">
                                        @if(Auth()->user()->fav_ads->count() > 0)
                                        @foreach(Auth()->user()->fav_ads as $fav)
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                     @if($fav->ad->images->count() > 0 )
                                                     <img src="{{ asset('/').@$fav->ad->images->first()->image }}" alt="{{ @$fav->ad->translations->first()->title }}">
                                                     @else 
                                                     <img src="{{ asset('/img/no_image.png')}}" alt="">
                                                     @endif
                                                </div>
                                                <div class="cont">
                                                    <a href="{{ URL::to('/').'/ads/'.$fav->ad_id.'/'.@str_replace(' ', '_', $fav->ad->translations->first()->title) }}" class="det" title="{{ @$fav->ad->translations->first()->title }}">
                                                        {{ @substr($fav->ad->translations->first()->title,0,33).'...' }}
                                                    </a>{{-- 
                                                    <small class="del fav"  data-ad-id="{{ @$fav->ad_id }}" data-user-id="{{ @Auth::id() }}"  >حذف</small> --}}
                                                    <a href="{{ URL::to('/') }}/i/fav/{{ @$fav->ad_id.'/'.@Auth::id() }}"  class="icon ">
                                                     
                                                       <i id="disLike" class="fas fa-heart"></i>

                                                   </a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                  
                                    </div>
                                </div>

                                <div id="tab-3" class="tab-content myadd">
                                    <ul>
                                       @if(Auth::user()->ads->count() > 0)
                                       @foreach(Auth::user()->ads as $ad)
                                        <li>
                                            <div class="img">
                                                <a href="#0"><img src="{{ asset('/').@$ad->images->first()->image }}" alt="{{ @$ad->translations->first()->title }}"></a>
                                            </div>
                                            <div class="info">
                                                <a href="#0">
                                                    <h6>{{ @$ad->translations->first()->title }}</h6>
                                                </a>
                                                <p>{{ @$ad->translations->first()->address }}</p>
                                            </div>
                                            <div class="edit">
                                                <a href="{{ URL::to('/').'/i/ads/'.@$ad->id.'/edit' }}"><span><i class="fas fa-pencil-alt"></i></span></a>
                                                <a href="{{ URL::to('/i/ads').'/'.@$ad->id.'/delete' }}"><span><i class="fas fa-trash-alt"></i></span></a>
                                            </div>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End profile  ====
        ======================================= -->


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
                        $(this.children(2).show());
                   }else{
                      $(this.children(1).show());
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