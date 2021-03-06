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
                        <h1>الدخول</h1>
                        <h5><a href="{{ url('/') }}">الرئسية</a><span>/</span><a href="#0">تسجيل الدخول</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start login  -->

        <section class="login section-padding">
            <div class="container">

                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">

                            <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
                                <div class="register-form">
                                    <h5 class="title"><span>تسجيل الدخول</span></h5>
                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') }}" placeholder="البريد الالكترونى">
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-12">
                                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="الرقم السرى">
                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback " role="alert">
                                                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button>تسجيل</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text hvcont">
                                        ليس لديك حساب حتى الآن؟ <a href="{{ URL::to('/register') }}">أنشئ حسابا</a> <br>
                                         @if (Route::has('password.request'))
                                        نسيت  كلمة المرور <a  href="{{ route('password.request') }}">استرداد كلمة  المرور ؟</a>
                                         @endif
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- End login  ====
        ======================================= -->


    </main>
@stop
{{-- <!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{@$setting->title_ar}}</title>
    @include('dashboard.layouts.meta_tags_social')
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{asset('/')}}/assets/js/plugins/forms/validation/validate.min.js"></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="{{asset('/')}}/assets/js/core/app.js"></script>
    <script type="text/javascript" src="{{asset('/')}}/assets/js/pages/login_validation.js"></script>

    <script type="text/javascript" src="{{asset('/')}}/assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->

</head>

<body class="login-container login-cover">

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content pb-20">

                    <!-- Form with validation -->
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                <h5 class="content-group">{{ __('Login') }} <small class="display-block">{{__('Your credentials')}}</small></h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" value="{{ old('email') }}" required autofocus>
                                 @if ($errors->has('email'))
                                    <span class="invalid-feedback " role="alert">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input  id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback " role="alert">
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group login-options">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="styled" >
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    <div class="col-sm-6 text-right">
                                    @if (Route::has('password.request'))
                                        <a  href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn bg-pink-400 btn-block">{{__('login')}} <i class="icon-arrow-left13 position-right"></i></button>
                            </div>

                            <span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                        </div>
                    </form>
                    <!-- /form with validation -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>
</html>
 --}}