@extends('frontend.astell.frontend_dashboard_astell')
@section('index_astell')
    <main class="sub">

        <section class="lnb">
            <a href="#" class="btn-back">A&amp;ultima</a>
            <div class="swiper-container v1">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">
                        <a id="moveFeature" class="m1 on">Features</a>
                    </li>
                    <li id="designGroupInfo" class="swiper-slide" style="display: none">
                        <a id="moveDesign" href="#" class="m2">Design</a>
                    </li>
                    <li class="swiper-slide">
                        <a id="moveSpecification" href="#" class="m3">Specification</a>
                    </li>
                </ul>
            </div>
        </section>

        {{-- Product Name Complate --}}
        <section class="sub-visual3 scrollAniTop">
            <div class="bg">
                <div class="swiper-container">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide"
                            style=" background-image: url('{{ isset($product->product_image) ? asset($product->product_image) : asset('upload/no_image.jpg') }}');">
                        </li>
                    </ul>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="wrap">
                {{-- <em>Ultra Portable &amp; Ultra Performance</em> --}}
                <strong> {{ Str::limit($product->product_name) }} </strong>

                <div class="scroll-icon">
                    Scroll
                    <div class="line"></div>
                </div>
            </div>
        </section>
        {{-- Product Name Complate --}}

        {{-- 1 2 3 4 --}}
        @if (
            !empty($sproducts->row_two_image_one) &&
                !empty($sproducts->row_two_image_two) &&
                !empty($sproducts->row_two_image_three) &&
                !empty($sproducts->row_two_image_four))
            <section class="img-group scrollAni n2">
                <ul>
                    <li>
                        <a href="javascript:void(0);" data-type="popMediaOpenN1"
                            style="
                                background-image: url('{{ asset('storage/single_product/' . $sproducts->row_two_image_one) }}');

                            "></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-type="popMediaOpenN2"
                            style="
                                background-image: url('{{ asset('storage/single_product/' . $sproducts->row_two_image_two) }}');
                                ">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-type="popMediaOpenN3"
                            style="
                            background-image: url('{{ asset('storage/single_product/' . $sproducts->row_two_image_three) }}');
                            ">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-type="popMediaOpenN4"
                            style="
                            background-image: url('{{ asset('storage/single_product/' . $sproducts->row_two_image_four) }}');
                            "></a>
                    </li>
                </ul>
            </section>
        @endif
        

        @if (
            !empty($sproducts->row_two_image_one) &&
                !empty($sproducts->row_two_image_two) &&
                !empty($sproducts->row_two_image_three) &&
                !empty($sproducts->row_two_image_four))
            <div class="popup-media n1" style="display: none">
                <div class="overlay" data-type="popMediaClose"></div>
                <div class="pop-inner">
                    <a href="javascript:void(0);" class="pop-close" data-type="popMediaClose"></a>
                    <div class="cont">
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_two_image_one) }}" alt="product" />
                    </div>
                </div>
            </div>
            <div class="popup-media n2" style="display: none">
                <div class="overlay" data-type="popMediaClose"></div>
                <div class="pop-inner">
                    <a href="javascript:void(0);" class="pop-close" data-type="popMediaClose"></a>
                    <div class="cont">
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_two_image_two) }}" alt="product" />
                    </div>
                </div>
            </div>
            <div class="popup-media n3" style="display: none">
                <div class="overlay" data-type="popMediaClose"></div>
                <div class="pop-inner">
                    <a href="javascript:void(0);" class="pop-close" data-type="popMediaClose"></a>
                    <div class="cont">
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_two_image_three) }}"
                            alt="product" />
                    </div>
                </div>
            </div>
            <div class="popup-media n4" style="display: none">
                <div class="overlay" data-type="popMediaClose"></div>
                <div class="pop-inner">
                    <a href="javascript:void(0);" class="pop-close" data-type="popMediaClose"></a>
                    <div class="cont">
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_two_image_four) }}" alt="product" />
                    </div>
                </div>
            </div>
        @endif

        <section class="detail-group1 scrollAni n3">
            <div class="wrap">
                <h3>{{ $sproducts->row_three_title }}</h3>
                <p>
                    {{ $sproducts->row_three_description }}
                </p>
            </div>
            <div class="gallery">
                <div class="swiper-container top">
                    <ul class="swiper-wrapper">
                        @foreach ($multiImages as $image)
                            <li class="swiper-slide">
                                <img src="{{ asset($image->multi_image) }}" alt="product" />
                            </li>
                        @endforeach
                    </ul>
                    <div class="swiper-page-group">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <div class="swiper-container thumbs">
                    <ul class="swiper-wrapper">
                        @foreach ($multiImages as $image)
                            <li class="swiper-slide">
                                <img src="{{ asset($image->multi_image) }}" alt="product" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        
        <!-- 비교테이블 -->

        @if (!empty($sproducts->row_six_background_image))
            <section class="detail-group29 scrollAni n4">
                <div class="bg"
                    style="background-image: url('{{ asset('storage/single_product/' . $sproducts->row_six_background_image) }}');">
                </div>
                <div class="wrap">
                    <h2>
                        {{ $sproducts->row_six_title }}
                    </h2>
                    <div class="n4-wrapper">
                        <h3 class="custom-title">
                            {{ $sproducts->row_six_sub_title }}
                        </h3>
                        <div class="n4-item">
                            <p>
                                {{ $sproducts->row_six_short_description }}
                            </p>
                            <p>
                                {{ $sproducts->row_six_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        

        <!-- 비교테이블 -->
        @if (!empty($sproducts->row_seven_background_image))
            <section class="detail-group10 scrollAni n5">
                <div class="bg"
                    style="background-image:  url('{{ asset('storage/single_product/' . $sproducts->row_seven_background_image) }}');">
                </div>
                <div class="wrap">
                    <div class="inner">
                        <h2>
                            {{ $sproducts->row_seven_title }}
                        </h2>
                    </div>
                </div>
            </section>
        @endif
        
        @if (!empty($sproducts->row_eight_image))
            <section class="detail-group10 scrollAni n6">
                <div class="wrap">
                    <img src="{{ asset('storage/single_product/' . $sproducts->row_eight_image) }}" />
                </div>
            </section>
        @endif
        {{-- <section class="detail-group13 scrollAni n6">
            <div class="wrap">
                <h3>Advanced User Interface</h3>
                <div class="group n1">
                    <img src="https://i.ibb.co/XZsCdQH/file-ima-1.png" alt="Advanced User Interface" />
                    <div class="inner">
                        <p>
                            While the A&amp;ultima SP1000M has the same intuitive menu
                            composition as its predecessor, the SP1000, its user interface
                            has been improved with the optional Virtual Back Key, which
                            enables users to control the device more easily and
                            conveniently. <br />
                            <br />
                            Use the Floating feature to place the Virtual Back Key at a
                            desired location or disable it by simply dragging it to the
                            middle of the screen or turning it off from the Settings menu.
                        </p>
                    </div>
                </div>
            </div>
        </section> --}}

        @if (!empty($sproducts->row_nine_background_image))
            <section class="detail-group10 scrollAni n7"
                style="background: #111420 url('{{ asset('storage/single_product/' . $sproducts->row_nine_background_image) }}') no-repeat right bottom;">
                {{-- row_nine_background_image --}}
                {{-- <style>
                    .detail-group10.n7 {}
                </style> --}}

                <div class="wrap">
                    <h3>
                        {{ $sproducts->row_nine_title }}
                    </h3>
                    <p>
                        {{ $sproducts->row_nine_sub_title }}
                    </p>
                    {{-- <a href="" class="lnk-ty2">Discover more
                    </a> --}}
                    <img src="{{ asset('storage/single_product/' . $sproducts->row_nine_image) }}" />
                </div>
            </section>
        @endif

        

        <!-- 다이어그램 -->

        <!-- &lt;section class="detail-group8 v1 scrollAni n7" style="background-image: url('https://www.iriverplus.com/site/ak/eng/img/userdata/sp1000m/img_usq_pattern_lg.png')"&gt; -->

        @if (
            !empty($sproducts->row_ten_image_one) &&
                !empty($sproducts->row_ten_image_two) &&
                !empty($sproducts->row_eleven_image))
            <section class="detail-group29 scrollAni n8">
                <div class="wrap">
                    <h3>
                        <span>{{ $sproducts->row_ten_title }}</span>
                    </h3>
                    <div class="thumbnail">
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_ten_image_one) }}" />
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_ten_image_two) }}" />
                    </div>
                    <p>
                        {{ $sproducts->row_ten_description }}
                    </p>
                    <div class="box">
                        <div>
                            <h3>
                                {{ $sproducts->row_eleven_title }}</h3>
                            <p>

                                {{ $sproducts->row_eleven_description }}
                            </p>
                        </div>
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_eleven_image) }}" />
                    </div>
                </div>
            </section>
        @endif

        

        <!-- 다이어그램 -->
        <section class="detail-group9 v3 scrollAni n9">
            {{-- <div class="wrap">
                <div class="box"> --}}
            {!! $sproducts->row_twelve_description !!}
            {{-- </div> --}}
        </section>

        {{-- <section class="detail-group6 scrollAni n9">
            <!--애니메이션 추가입니다. scrollAni n8-->
            <h3>Faster Charging, Quicker File Transfer</h3>
            <ul class="n1">
                <li>
                    <img src="https://i.ibb.co/jHycRb3/i-power.png" alt="2hours" />
                    <strong>3hours</strong>
                    <p>Charging about</p>
                </li>
                <li>
                    <img src="https://i.ibb.co/xgY6FNg/i-login.png" alt="12hours" />
                    <strong>10hours</strong>
                    <p>Playing back up to</p>
                </li>
                <li>
                    <img src="https://i.ibb.co/vDBVgRh/i-wifi.png" alt="10Gbps" />
                    <strong>10Gbps</strong>
                    <p>file transfer speeds up to</p>
                </li>
            </ul>
            <div class="n2">
                <p>
                    Next generation USB Type-C support allows file transfer speeds up
                    to 10Gbps and supports both data transfer and charging from the
                    same cable. USB 3.0 protocol transfers data twice as fast when
                    compared to other Astell&amp;Kern players. Charging with a fast
                    charger (at 9V/1.67A) takes only two hours and allows up to 12
                    hours of continuous playback.
                </p>
                <ul>
                    <li>
                        The maximum 10-hour continuous play is based on 16-bit/44 kHz,
                        FLAC file format, screen off, 75 of volume playback.
                    </li>
                    <li>
                        Fast charger (9V/1.67A) and general Charger (5V/2A) are not
                        included in the package.
                    </li>
                </ul>
            </div>
        </section> --}}

        @if (
            !empty($sproducts->row_thirteen_background_image) &&
                !empty($sproducts->row_thirteen_image_one) &&
                !empty($sproducts->row_thirteen_image_two))
            <section class="detail-group8 v1 scrollAni n10">
                <div class="bg"
                    style="
                        background-image: url('{{ asset('storage/single_product/' . $sproducts->row_thirteen_background_image) }}');
                        ">
                </div>
                <div class="wrap">
                    <h3>{{ $sproducts->row_thirteen_image_one_title }}</h3>
                    <p></p>
                    <img class="img1" src="{{ asset('storage/single_product/' . $sproducts->row_thirteen_image_one) }}"
                        alt="img" />
                    <h3>{{ $sproducts->row_thirteen_image_two_title }}</h3>
                    <p></p>
                    <img class="img2" src="{{ asset('storage/single_product/' . $sproducts->row_thirteen_image_two) }}"
                        alt="img" />
                </div>
            </section>
        @endif

        

        @if (!empty($sproducts->row_fourteen_background_image))
            <section class="detail-group3 scrollAni n11">
                <div class="bg"
                    style="
                    background-image:  url('{{ asset('storage/single_product/' . $sproducts->row_fourteen_background_image) }}');
                    background-color: transparent;
                    background-position: center bottom;
                    ">
                </div>
                <div class="wrap">
                    <h3>{{ $sproducts->row_fourteen_title }}</h3>
                </div>
            </section>
        @endif

        

        @if (!empty($sproducts->row_fifteen_image))
            <section class="detail-group4 scrollAni n12">
                <div class="bg">{{ $sproducts->row_fifteen_title }}</div>
                <div class="wrap">
                    <h3>
                        {{ $sproducts->row_fifteen_sub_title }}
                    </h3>
                    <p>
                        {{ $sproducts->row_fifteen_description }}
                </div>
            </section>
        @endif

        @if (!empty($sproducts->row_sixteen_background_image) && !empty($sproducts->row_sixteen_image))
            <section class="detail-group29 scrollAni n13">
                <div class="bg"
                    style="
                    background-image: url({{ asset('storage/single_product/' . $sproducts->row_sixteen_background_image) }});
                    ">
                </div>
                <div class="wrap">
                    <h3>
                        <span>{{ $sproducts->row_sixteen_title }}</span>
                        {{ $sproducts->row_sixteen_sub_title }}
                    </h3>
                    <p>
                        {{ $sproducts->row_sixteen_description }}
                    </p>
                    <img src="{{ asset('storage/single_product/' . $sproducts->row_sixteen_image) }}" alt="detail_5" />
                </div>
            </section>
        @endif

        @if (!empty($sproducts->row_seventeen_image))
            <section class="detail-group19 scrollAni n14" style="background-color: #040802">
                <div class="bg"
                    style="
                    background-image: url({{ asset('storage/single_product/' . $sproducts->row_seventeen_image) }});
                    background-color: #040802;
                    background-size: cover;
                    ">
                </div>

                <div class="wrap">
                    <h3>
                        {{ $sproducts->row_seventeen_title }}
                    </h3>
                </div>
            </section>
        @endif

        {{-- End 17 --}}




        <!-- 디자인 -->
        <section class="dropdown-list">
            <div class="wrap">
                <h3>Product Details</h3>
                <ul>
                    <li>
                        <a href="javascript:void(0)">Short Description</a>
                        <div class="cont">
                            <ul>
                                {!! $product->short_desc !!}
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0)">OverView</a>
                        <div class="cont">
                            <ul>
                                {!! $product->overview !!}
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Specification</a>
                        <div class="cont">
                            <ul>
                                {!! $product->specification !!}
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <div class="popup-media v1" style="display: none">
            <div class="overlay" data-type="popMediaClose"></div>
            <div class="pop-inner">
                <a href="#" class="pop-close" data-type="popMediaClose"></a>
                <div class="cont">
                    <img id="imgIframe" src="#" alt="" />
                </div>
            </div>
        </div>
        <div class="popup-media v2" style="display: none">
            <div class="overlay" data-type="popMediaClose"></div>
            <div class="pop-inner">
                <a href="#" class="pop-close" data-type="popMediaClose"></a>
                <div class="cont">
                    <div class="youtube-area">
                        <iframe id="videoIframe" width="100%" height="100%" src="#"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
