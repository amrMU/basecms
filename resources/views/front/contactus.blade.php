@extends('front.layouts.main')
@section('meta_tags')
    <title> اتصل بنا | {{@$category->category_translation->name}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" اتصل بنا  | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/about_us')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content="  اتصل بنا |  {{@$category->category_translation->name}}" />
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
                        <h1> اتصل بنا </h1>
                        <h5><a href="{{ url('/') }}">الرئسية</a><span>/</span><a href="#">اتصل بنا</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start Contact  -->

        <section class="contact section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-10 offset-lg-1">
                        <div class="contact-info">
                            <div class="row">
                                @foreach($setting->address as $address)
                                <div class="col-md-4">
                                    <div class="item">
                                        <span class="icon ti-map-alt"></span>
                                        <div class="cont">
                                            <h6>{{ @$address->address_ar }}</h6>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @foreach($setting->phones as $phone)
                                <div class="col-md-4" title="رقم الهاتف" >
                                    <div class="item">
                                        <span class="icon ti-mobile"></span>
                                        <div class="cont">
                                            <h6>{{ @$phone->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @foreach($setting->whatsapp as $whatsapp)
                                <div class="col-md-4" title="واتساب">
                                    <div class="item">
                                        <span class="icon ti-themify-favicon-alt"></span>
                                        <div class="cont">
                                            <h6>{{ @$whatsapp->whatsapp }}</h6>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @foreach($setting->emails as $email)
                                <div class="col-md-4">
                                    <div class="item">
                                        <span class="icon ti-email"></span>
                                        <div class="cont">
                                            <h6>{{ @$email->email }} - {{ @$email->department }}</h6>
                                        </div> 
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                        <div class="contact-form">
                            <h5 class="title"><span>ارسل رساله</span></h5>
                            <form action="{{ url('/contactus') }}" method="post">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" value="{{ Request::old('name') }}" placeholder="الاسم بالكامل">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" value="{{ Request::old('email') }}" id="" placeholder="البريد الالكترونى">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="subject" value="{{ Request::old('subject') }}"  placeholder="الموضوع">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" value="{{ Request::old('phone') }}" placeholder="رقم الهاتف">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="message" id="" placeholder="رسالتك"> {{ Request::old('message') }} </textarea>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit">ارسال</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Contact  ====
        ======================================= -->


    </main>
@stop