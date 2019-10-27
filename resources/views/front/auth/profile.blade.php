@extends('front.layouts.main')
@section('meta_tags')
    <title> لملف الشخصي| {{@$setting->translation->title}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" @lang('home.aboutus') | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/about_us')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="لملف الشخصي| | {{@$setting->translation->title}}" />
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
                        <h5><a href="index.html">الرئسية</a><span>/</span><a href="#0">حسابى</a></h5>
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
                                    <img id="blah" src="{{ asset('front/images/profile.jpg') }}" alt="">
                                </div>
                                <span class="icon"><i class="far fa-edit"></i></span>
                                <input type="file" name="pic" accept="image/*" onchange="readURL(this);">
                            </div>
                            <div class="user-info">
                                <ul>
                                    <li><span>الاسم : </span>{{ @Auth::user()->fname.' '.@Auth::user()->fname }}</li>
                                    <li><span>رقم الهاتف : </span> {{ @Auth::user()->phone }}</li>
                                    {{-- <li><span>المدينة : </span> {{ @Auth::user()->city-> }}</li> --}}
                                    <li><span>البريد الالكترونى : </span>{{ @Auth::user()->email }}</li>
                                </ul>
                                <div class="text-center">
                                    <a href="#0" class="butn butn-bg"><span>تعديل البيانات</span></a>
                                </div>
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
                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الاسم الاول</label>
                                                        <input type="text" name="user_firstname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الاسم الاخير</label>
                                                        <input type="text" name="user_lastname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الجنسية</label>
                                                        <select>
                                                            <option value="0">-- اختر --</option>
                                                            <option value="1">الفجيرة</option>
                                                            <option value="2">أبو ظبي</option>
                                                            <option value="3">شرم أبحر</option>
                                                            <option value="4">دومة الجندل</option>
                                                            <option value="5">وادي الطوقي</option>
                                                            <option value="6">دبي</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">رقم الهاتف</label>
                                                        <input type="text" name="user_phone">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <h6><span>بيانات الحساب</span></h6>

                                        <form action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">البريد الالكترونى</label>
                                                        <input type="email" name="user_email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">الرقم السرى</label>
                                                        <input type="text" name="user_pass">
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
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="{{ asset('front/images/1.jpg') }}" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="{{ asset('front/images/2.jpg') }}" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="{{ asset('front/images/3.jpg') }}" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="{{ asset('front/images/4.jpg') }}" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"> <img src="{{ asset('front/images/1.jpg') }}" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="item">
                                                <div class="img">
                                                    <a href="#0"><img src="{{ asset('front/images/2.jpg') }}" alt=""></a>
                                                </div>
                                                <div class="cont">
                                                    <a href="#0" class="det">تفاصيل الإعلان</a>
                                                    <a href="#0" class="del">حذف</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-3" class="tab-content myadd">
                                    <ul>
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
{{-- 
                                        <li>
                                            <div class="img">
                                                <a href="#0"><img src="{{ asset('front/images/2.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="info">
                                                <a href="#0">
                                                    <h6>شاليه للايجار بالتكييفات فى مارينا.</h6>
                                                </a>
                                                <p>مارينا 5, مارينا, العلمين, الساحل الشمالي</p>
                                            </div>
                                            <div class="edit">
                                                <a href="#0"><span><i class="fas fa-pencil-alt"></i></span></a>
                                                <a href="#0"><span><i class="fas fa-trash-alt"></i></span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <a href="#0"><img src="{{ asset('front/images/3.jpg') }}" alt=""></a>
                                            </div>
                                            <div class="info">
                                                <a href="#0">
                                                    <h6>شاليه للايجار بالتكييفات فى مارينا.</h6>
                                                </a>
                                                <p>مارينا 5, مارينا, العلمين, الساحل الشمالي</p>
                                            </div>
                                            <div class="edit">
                                                <a href="#0"><span><i class="fas fa-pencil-alt"></i></span></a>
                                                <a href="#0"><span><i class="fas fa-trash-alt"></i></span></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <a href="#0"><img src=front"images/4.jpg" alt=""></a>
                                            </div>
                                            <div class="info">
                                                <a href="#0">
                                                    <h6>شاليه للايجار بالتكييفات فى مارينا.</h6>
                                                </a>
                                                <p>مارينا 5, مارينا, العلمين, الساحل الشمالي</p>
                                            </div>
                                            <div class="edit">
                                                <a href="#0"><span><i class="fas fa-pencil-alt"></i></span></a>
                                                <a href="#0"><span><i class="fas fa-trash-alt"></i></span></a>
                                            </div>
                                        </li> --}}
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