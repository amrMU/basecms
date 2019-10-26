<!DOCTYPE html>
<html lang="zxx">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
   
    <!-- Title  -->
    <title>{{@$setting->translation->title}}</title>
    @yield('meta_tags')

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('/front/images/favicon.png')}}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Tajawal:200,300,400,500,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('/front')}}/css/plugins.css" />

    <!-- bootstrap-rtl.min -->
    <link rel="stylesheet" href="{{asset('/front')}}/css/bootstrap-rtl.min.css" />

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{asset('/front')}}/css/style.css" />

</head>

<body>

    <!-- =====================================
    	  ==== Start Loading -->

    <div class="loading valign">
        <div class="full-width">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <!-- End Loading ====
        ======================================= -->



    <!-- =====================================
        ==== Start Navbar -->

    <div class="nav-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 right">
                    <div class="mnav">
                        <ul>
                            <li class="nvmenu">
                                <div class="logo">
                                    @if($setting->logo === null )
                                    <a href="{{URL::to('/')}}"><img src="{{asset('/front/images/logo.png')}}" alt=""></a>

                                    @else 
                                    <a href="{{URL::to('/')}}"><img src="{{asset('/').@$setting->logo}}" alt=""></a>
                                    @endif
                                </div>
                            </li>

                            <li class="nvmenu">
                                <a href="{{ URL::to('/') }}">الرئسية</a>
                            </li>
                            @foreach($categories as $category)
                            <li class="nvmenu">
                                <a href="{{ URL::to('/').'/categories/'.$category->id.'/'.str_replace(' ', '_', $category->category_translation->name) }}">{{ @$category->category_translation->name }} @if($category->sub_categories->count() > 0)<span class="ti-angle-down"></span>@endif</a>
                                @if($category->sub_categories->count() > 0)
                                <ul class="menu">
                                    @foreach($category->sub_categories as $sub)
                                    <li><a href="{{ URL::to('/').'/categories/'.$sub->id.'/'.str_replace(' ', '_', $sub->category_translation->name) }}">{{ @$sub->category_translation->name }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach

                            <div class="clear-fix"></div>
                        </ul>
                        <div class="clear-fix"></div>
                    </div>
                    <div class="clear-fix"></div>
                </div>

                <div class="col-lg-4 left">
                    <div class="user-area">
                        <ul>
                            <li class="nav-user">
                                <a href="#0" class="butn butn-bg">
                                    <span>تسجيل دخول</span>
                                </a>
                            </li>
                            <li class="nav-user">
                                <a href="#0" class="butn butn-bord">
                                    <span>حساب جديد</span>
                                </a>
                            </li>
                            <div class="clear-fix"></div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="nav-mobile">
        <div class="container">
            <div class="row">
                <div class="col-6 right">
                    <div class="mnav-icon">
                        <ul>
                            <li>
                                <div class="nav-icon">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </li>
                            <li>
                                <div class="logo">
                                    @if(isset($setting))
                                    @if(isset($setting->logo))
                                    <a href="#0"><img src="{{asset('/')}}.@$setting->logo" alt=""></a>
                                    @else
                                    <a href="#0"><img src="{{asset('/front/images/logo.png')}}" alt=""></a>
                                    @endif
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-6 left">
                    <div class="user-area">
                        <ul>
                            <li class="nav-user">
                                <a href="#0" class="butn butn-bg">
                                    <span>تسجيل دخول</span>
                                </a>
                            </li>
                            <li class="nav-user">
                                <a href="#0" class="butn butn-bord">
                                    <span>حساب جديد</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="colaps-menu">
            <div class="mnav">
                <ul>
                    <li class="nvmenu">
                        <a href="#0">الرئسية</a>
                    </li>

                    <li class="nvmenu">
                        <a href="#0">العقارات</a>
                    </li>

                    <li class="nvmenu">
                        <a href="#0" class="drop">الاماكن السياحيه <span class="ti-angle-down"></span></a>

                        <ul class="menu">
                            <li><a href="#0">سياحة</a></li>
                            <li><a href="#0">كافيهات</a></li>
                            <li><a href="#0">مطاعم</a></li>
                            <li><a href="#0">مولات</a></li>
                            <li><a href="#0">مراكز صحيه</a></li>
                        </ul>
                    </li>

                    <li class="nvmenu">
                        <a href="#0">فنادق وشقق</a>
                    </li>

                    <li class="nvmenu">
                        <a href="#0" class="drop">الخدمات العامة <span class="ti-angle-down"></span></a>

                        <ul class="menu">
                            <li><a href="#0">سباكه</a></li>
                            <li><a href="#0">كهربا</a></li>
                            <li><a href="#0">خدمات عامة</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- End Navbar ====
        ======================================= -->
        @yield('content')
    <!-- =====================================
        ==== Start Footer -->

    <footer class="text-center bg-img" data-overlay-dark data-background="images/pattern-b.png">

        <div class="container">

            <a href="#home" class="totop ti-angle-double-up" data-scroll-nav="0"></a>

            <div class="social">
                @if(isset($setting))
                    @if(isset($setting->social_media_link))
                        @foreach($setting->social_media_link as $link)
                        <a href="{{@$link->url}}" class="icon">
                            <!-- <i class="fab fa-twitter"></i> -->
                            <img src="{{URL::to('/').@$link->icon}}" title="{{@$link->social_media_translation->name}}">
                        </a>
                        @endforeach
                    @endif
                @endif

                <!-- <a href="#0" class="icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#0" class="icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#0" class="icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a href="#0" class="icon">
                    <i class="fab fa-behance"></i>
                </a>
                <a href="#0" class="icon">
                    <i class="fab fa-instagram"></i>
                </a> -->
            </div>

            <p>&copy; جميع الحقوق محفوظة - صمّم هذا الموقع من طرف alyomhost.</p>

        </div>
    </footer>

    <!-- End Footer ====
        ======================================= -->





    <!-- jQuery -->
    <script src="{{asset('/front')}}/js/jquery-3.0.0.min.js"></script>
    <script src="{{asset('/front')}}/js/jquery-migrate-3.0.0.min.js"></script>

    <!-- popper.min -->
    <script src="{{asset('/front')}}/js/popper.min.js"></script>

    <!-- bootstrap -->
    <script src="{{asset('/front')}}/js/bootstrap.min.js"></script>

    <!-- owl carousel -->
    <script src="{{asset('/front')}}/js/owl.carousel.min.js"></script>

    <!-- parallaxie js -->
    <script src="{{asset('/front')}}/js/parallaxie.js"></script>

    <!-- aos js -->
    <script src="{{asset('/front')}}/js/wow.min.js"></script>

    <!-- jquery-ui  -->
    <script src="{{asset('/front')}}/js/jquery-ui.js"></script>

    <!-- jquery.magnific-popup.min js -->
    <script src="{{asset('/front')}}/js/jquery.magnific-popup.min.js"></script>

    <!-- slick.min js -->
    <script src="{{asset('/front')}}/js/slick.min.js"></script>

    <!-- validator js -->
    <script src="{{asset('/front')}}/js/validator.js"></script>

    <!-- custom scripts -->
    <script src="{{asset('/front')}}/js/scripts.js"></script>

    <script>
        new WOW().init();
    </script>


    <script>
        $(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [0, 500],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        });
    </script>
    @yield('jsCode')


</body>

</html>