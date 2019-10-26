@extends('front.layouts.main')
@section('meta_tags')
    <title>تسجيل الدخول | {{@$setting->translation->title}}</title>
    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content="تسجيل الدخول  | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/about_us')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="تسجيل الدخول  | {{@$setting->translation->title}}" />
    <meta name="twitter:site"content="@wait" />
@stop
@section('content')

    <main>

        <!-- =====================================
        ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="{{ asset('/front/images/banner-1.jpg') }}">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        <h1>حساب جديد</h1>
                        <h5><a href="index.html">الرئسية</a><span>/</span><a href="#0">إنشاء حساب</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->


        
        <!-- =====================================
        ==== Start register  -->

        <section class="register section-padding">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">

                            <div class="col-lg-4 order-1">
                                <div class="register-info">
                                    <h5 class="title"><span>تعليمات التسجيل</span></h5>
                                    <div class="cont">
                                        <h6>ما يجب القيام به عند اختيار الدفع عبر التحويل البنكي :</h6>
                                        <div class="text">
                                            ١- تحويل مبلغ البرنامج المطلوب على الحساب البنكي البنك الاهلي : مركز انا
                                            التغير الرياضي رقم الحساب :13547194009303 رقم الايبان :SA18 1000 0013 5471
                                            9400 9303
                                        </div>
                                        <div class="text">
                                            ٢- قم بتعبئة جميع البينات واختيار البرنامج المطلوب شرائه
                                        </div>
                                        <div class="text">
                                            ٣- ارفق صورة الوصل , السند او رسالة التحويل
                                        </div>
                                        <div class="text support">
                                            سيتفعل حسابك في خلال 48-24 ساعة في حال مواجهة اي مشكلة اثناء عملية التسجيل
                                            او ارفاق صورة التحويل تواصل مع الدعم الفني
                                        </div>
                                        <h4 class="email-support"><a href="#0">example@gmail.com</a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 order-2">
                                <div class="register-form">
                                    <h5 class="title"><span>إنشاء حساب</span></h5>
                                    <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                     @if(Session('success'))
                                        <div class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>@lang('home.success')!</strong> {{session('success')}}.
                                        </div>
                                        @endif            
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input  type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                            </div>
                                            <div class="col-md-12">
                                                <input  type="email" class="form-control" name="email" value="{{ old('email') }}" required 
                                                    placeholder="البريد الالكترونى">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control" name="password" required placeholder="الرقم السرى">
                                            </div>
                                            <div class="col-md-12">
                                                <input  type="password" class="form-control" name="password_confirmation" required placeholder="تأكيد كلمة المرور">
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" >إنشاء حساب</button>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="text hvcont">
                                        هل لديك حساب؟ <a href="{{ route('login') }}">سجّل الدخول</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- End register  ====
        ======================================= -->


    </main>
@stop
