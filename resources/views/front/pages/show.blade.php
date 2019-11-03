@extends('front.layouts.main')
@section('meta_tags')
    <title> {{ @$page->translation->title }} | {{@$setting->translation->title}}</title>

    <meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
    <meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
    <meta property="og:description"content="{{ @$info->translation->content }}" />
    <meta property="og:title"content=" {{ @$page->translation->title }} | {{@$setting->translation->title}} " />
    <meta property="og:url"content="{{URL::to('/')}}" />
    <meta property="og:site_name"content="{{@$setting->translation->title}}" />
    <meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

    <meta name="twitter:card"content="summary" />
    <meta name="twitter:title"content=" {{ @$page->translation->title }} | {{@$setting->translation->title}}" />
    <meta name="twitter:site"content="@wait" />
@stop
@section('content')
    <main>

        <!-- =====================================
        ==== Start Header -->

        <header id="home" class="header pages bg-img valign" data-overlay-dark="7"
            data-background="{{asset('/front')}}/images/banner-1.jpg">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center caption">
                        <h1> {{ @$page->translation->title }} </h1>
                        <h5><a href="{{URL::To('/')}}">الرئيسيه</a><span>/</span><a href="#">{{ @$page->translation->title }}</a></h5>
                    </div>
                </div>
            </div>

        </header>

        <!-- End Header ====
        ======================================= -->



        <!-- =====================================
        ==== Start Page  -->

        <section class="page section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="intro">
                            <h6>{{ @$page->translation->title }}</h6>
                            <p>{!!  @$page->translation->content  !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Page  ====
        ======================================= -->



        @include('front.testmonials.for_base_pages')

    </main>

@stop