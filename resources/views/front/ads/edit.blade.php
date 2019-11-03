@extends('front.layouts.main')
@section('meta_tags')
<title> تحديث بيانات  الإعلان| {{@$setting->translation->title}}</title>

<meta name='description' itemprop='description' content='{!! @$info->translation->content!!}' />
<meta name='keywords' content='{!!@$setting->meta_tags!!},{!!@$info->translation->title !!},{!!@$info->mission !!},{!!@$info->goals!!}' />
<meta property="og:description"content="{{ @$info->translation->content }}" />
<meta property="og:title"content=" @lang('home.aboutus') | {{@$setting->translation->title}} " />
<meta property="og:url"content="{{URL::to('/about_us')}}" />
<meta property="og:site_name"content="{{@$setting->translation->title}}" />
<meta property="og:image" content="{{URL::to('/').@$setting->logo}}">

<meta name="twitter:card"content="summary" />
<meta name="twitter:title"content="تحديث بيانات  الإعلان  | {{@$setting->translation->title}}" />
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
                    <h1>تحديث بيانات الإعلان</h1>
                    <h5><a href="{{ URL::to('/') }}">الرئيسيه</a><span>/</span><a href="#0">تحديث بيانات الإعلان</a></h5>
                </div>
            </div>
        </div>

    </header>

    <!-- End Header ====
        ======================================= -->



    <!-- =====================================
        ==== Start vert  -->



    <!-- =====================================
        ==== Start addvert  -->


        <section class="advert section-padding ">
            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <form  method="POST" action="{{ URL::to('/i/advertising'.'/'.@$ad->id) }}" enctype='multipart/form-data'>
                            <input name="_method" type="hidden" value="PUT">
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
                            <div class="col-lg-10 offset-lg-1">
                                <div class="content">

                                    <div class="title">
                                        <span><i>01 </i> أضف صوره</span>
                                    </div>

                                    <div class="upload-img">
                                        <div class="img">
                                            <img id="blah" src="" alt="">
                                        </div>
                                        <div class="butn-upload valign">
                                            <div class="full-width">
                                                <div class="box">
                                                    <span class="icon"><i class="far fa-image"></i></span>
                                                    <input type="file" name="images[]" multiple="" accept="image/*" onchange="">
                                                    <h6>اضف صوره للإعلان</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="title">
                                        <span><i>02 </i> تفاصيل الإعلان</span>
                                    </div>

                                    <div class="details">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="">
                                                    <select name="category_id" id="parent_id" class="form-control" >
                                                        <option value="">@lang('home.main_categories')</option>
                                                        @foreach($categories as $category)
                                                        <option 
                                                        value="{{@$category->id}}"
                                                        @if($category->id == $ad->category->parent_id)
                                                          selected
                                                           @endif
                                                        >
                                                        {{@$category->category_translation->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                         <div class="alert alert-danger alert-dismissible" id="sub_categoris_unknown">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close" style="right: 5px;">&times;</a>@lang('home.empty_sub_categories')
                                        </div>
                                        <div >
                                         <select name="sub_categoris" id="sub_categoris" class="form-control" >
                                            <option value="">@lang('home.sub_categories')</option>
                                            @if(isset($ad))
                                            @include('front.ads.select_sub_categories_loop_for_update')
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div style="margin: 8px 0px 8px 0px">
                                       <select name="add_type" class="form-control" >
                                        <option value="own"  @if(Request::old('add_type') == "own") selected @endif >
                                        @lang('home.own') </option>
                                        <option value="rent"  @if(Request::old('add_type') == "rent")selected  @endif >
                                            @lang('home.rent')
                                        </option> 
                                        <option value="purchase" @if(Request::old('add_type') == "purchase")selected   @endif>
                                            @lang('home.purchase') 
                                        </option>
                                        <option value="other" @if(Request::old('add_type') == "other")selected @endif>
                                            @lang('home.other') 
                                        </option>

                                    </select>
                                </div>
                            </div>
                            @if($site_langs->count() > 0)
                            @foreach($site_langs as $key => $lang)

                             <!-- categories input -->
                            <input type="hidden" name="lang[]" value="{{ @$lang->id }}">
                            <!-- title  input -->
                            <div class="col-lg-12">
                                <input  type="text"
                                        name="title[]"  style="margin: 8px 0px 8px 0px"
                                        class="form-control" 
                                        placeholder="@lang('home.title_'.@$lang->info->local)" 
                                            value="{{@$ad->translations->where('lang_id',@$lang->id)->first()->title }} "  >
                            </div>

                            <!-- /  title input -->
                            <!-- address  input -->
                            <div class="col-lg-12">
                                <input type="text" 
                                       name="address[]" 
                                       class="form-control"  style="margin: 8px 0px 8px 0px"
                                       placeholder="@lang('home.location_'.@$lang->info->local)" 
                                         value="{{ @$ad->translations->where('lang_id',@$lang->id)->first()->address }}">
                                     </div>
                            <!-- /address  input -->
                            <div class="col-lg-12">
                                <textarea name="content[]"
                                           id="editor1" 
                                           rows="4" 
                                           class="form-control" 
                                           cols="4"  
                                           placeholder="@lang('home.content_'.@$lang->info->local)">{{ @$ad->translations->where('lang_id',$lang->id)->first()->content }}</textarea>
                            </div>
                            {{-- content --}}
                        @endforeach
                        @endif

                        <div class="col-lg-6"  style="margin: 8px 0px 8px 0px">
                            <input type="text" 
                            name="space" 
                            class="form-control " 
                            placeholder="@lang('home.space')" 
                            value="{{  $ad->space}}" >
                        </div>

                        <div class="col-lg-6"  style="margin: 8px 0px 8px 0px">
                            <input type="text" 
                            name="bed_room" 
                            class="form-control" 
                            placeholder="@lang('home.bed_room')" 

                            value="{{ @$ad->bed_room }}"  >
                        </div>
                        <!-- bathroom input -->
                        <div class="col-lg-6"  style="margin: 8px 0px 8px 0px">
                            <input type="text" 
                            name="bathroom" 
                            class="form-control" 
                            placeholder="@lang('home.bathroom')" 
                            value="{{   @$ad->bathroom  }}" 
                            >
                        </div>
                        <!-- /bathroom input -->
                        <!-- parking input -->

                        <div class="col-lg-6"  style="margin: 8px 0px 8px 0px">
                            <input type="text" 
                            name="parking" 
                            class="form-control" 
                            placeholder="@lang('home.parking')" 
                            value="{{  @$ad->parking }}" >
                        </div>
                        <!-- /parking input -->
                        <!-- /price input -->
                        <div class="col-lg-6">
                            <input type="text" 
                            name="price" 
                            class="form-control"   style="margin: 8px 0px 8px 0px"
                            placeholder="@lang('home.price')" 
                            value="{{ @$ad->price }}">
                        </div>
                        <!-- /price input -->
                        <!-- /embedded_map input -->
                        <div class="col-lg-6">
                            <input type="text" name="map" class="form-control"  style="margin: 8px 0px 8px 0px"  placeholder="@lang('home.embedded_map')" value="{{ @$ad->map  }}">
                        </div>
                        <!-- /embedded_map input -->
                        
                        <div class="col-lg-12 text-center"  style="margin: 8px 0px 8px 0px">
                            <button type="submit" class="butn butn-bg"><span>حفظ ونشر
                            الاعلان</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- slider --}}
<div class="  col-2">
    {{--  --}}
    {{--  --}}
    <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
    @foreach($ad->images as $key => $image)
        <li data-target="#demo" data-slide-to="{{ @$key }}" class="@if($key == 0) active @endif"></li>
        @endforeach
<li data-target="#demo" data-slide-to="1"></li>
<li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
@foreach($ad->images as $key => $image)
<div class="carousel-item @if($key == 0) active @endif">
    <img src="{{url('/').@$image->image}}"  class="img-responsive" style="max-width:100%" >
          <a  href="{{ URL::to('/').'/i/ads/'.$image->id.'/image/delete' }}" style="position: absolute; top: 8px; right: 8px; width: 28px; height: 28px; border: 1px solid #f70606; border-radius: 50%; line-height: 28px; text-align: center; font-size: 11px; color: #f70606">
            <span class="glyphicon glyphicon-remove"></span>
        </a>
</div>
@endforeach

</div>

<!-- Left and right controls -->

</div>
{{--  --}}
{{--  --}}


</div>
</div>
{{-- slider --}}

</div>
</div>
</section>

    <!-- End addvert  ====
        ======================================= -->


    </main>
    @stop

    @section('jsCode')
    <script type="text/javascript">


//script getting sub categories fillter
@if($ad->category->parent_id != NULL)//show sub categories or no sub mesg condetion
$('#sub_categoris').show();
$('#sub_categoris_unknown').hide();
@else
$('#sub_categoris').hide();
$('#sub_categoris_unknown').show();
@endif//end condetion
$('#parent_id').on('change',function () {
    if ($(this).val() != '') {
        var parent_id = $(this).val();
        $.ajax({
            'url' : '{{ URL::to('/') }}/api/categories/' + parent_id,
            'type' : 'GET',
            'success' : function(data) {     
               console.log(data.data.length );
                if (data.data.length == 0) {
                    $('#sub_categoris').hide();
                    $('#sub_categoris_unknown').show();
                    $('#sub_categoris').empty()
                    
                } //where sub categories list  length = 0
                else{//where sub categories list  length  > 0 will append in #sub_categoris

                    $('#sub_categoris').show();
                    $('#sub_categoris_unknown').hide();
                    $('#sub_categoris').empty()
                    for (var i = data.data.length - 1; i >= 0; i--) {
                        $('#sub_categoris').append("<option value='"+data.data[i].id+"'>"+data.data[i].category_translation.name+"</option")   
                    }
                }   
            }//server success case 
            ,'error' : function(request,error)
            {
                $('#sub_categoris').hide();
                $('#sub_categoris_unknown').show();
            }//server error case 
        });
    }else{
        $('#sub_categoris').hide();
        $('#sub_categoris_unknown').show();
    }
});
</script>
@stop