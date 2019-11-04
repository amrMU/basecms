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
                        <h5><a href="{{ URL::to('/') }}">الرئسية</a><span>/</span><a href="#0">إنشاء حساب</a></h5>
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
                            @if($policy != null)
                            <div class="col-lg-4 order-1">
                                <div class="register-info">
                                    <h5 class="title"><span>تعليمات التسجيل</span></h5>
                                    <div class="cont">
                                       
                                        {!! @$policy->translation->content!!}
                                    </div>
                                </div>
                            </div>
                            @endif

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
                                                <input  type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="اسم المستخدم" required autofocus>
                                            </div>
                                            <div class="col-md-12">
                                                <input  type="email" class="form-control" name="email" value="{{ old('email') }}" required 
                                                    placeholder="البريد الالكترونى">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control" name="password" required placeholder="كلمة المرور">
                                            </div>
                                            <div class="col-md-12">
                                                <input  type="password" class="form-control" name="password_confirmation" required placeholder="تأكيد كلمة المرور">
                                            </div>
                                            <div class="text hvcont">
                                                <input type="checkbox" name="terms" style="float: right; width: auto; margin-top: 10px; margin-left: 10px;"> 
                                                اقر بالموافقه علي  <a href="{{ url('/').'/pages/'.@$policy->id.'/'.@$policy->url }}">شروط  الاستخدام </a>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit" >إنشاء حساب</button>
                                            </div>
                                        </div>

                                    </form>
                                   {{--  <div class="text hvcont">
                                        <input type="checkbox" name="terms"> 
                                        اقر بالموافقه علي  <a href="{{ url('/').'pages/'.@$policy->id.'/'.@$policy->url }}">شروط  الاستخدام </a>
                                    </div> --}}
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
