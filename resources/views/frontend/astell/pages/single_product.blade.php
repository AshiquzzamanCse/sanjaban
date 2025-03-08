@extends('frontend.astell.frontend_dashboard_astell')
@section('index_astell')

    <style>
        /*USE CSS for Slider*/

        .vehicle-detail-banner .car-slider-desc {
            max-width: 180px;
            margin: 0 auto;
        }

        .banner-slider .slider.slider-for {
            max-width: 84%;
            padding-right: 35px;
        }

        .banner-slider .slider.slider-nav {
            max-width: 16%;
        }

        .banner-slider .slider.slider-for,
        .banner-slider .slider.slider-nav {
            width: 100%;
            float: left;
        }

        .banner-slider .slider.slider-nav {
            height: 610px;
            overflow: hidden;

        }

        .slider-banner-image {
            height: 610px;
        }

        .banner-slider .slider.slider-nav {
            padding: 20px 0 0;
        }

        .slider-nav .slick-slide.thumbnail-image .thumbImg {
            max-width: 178px;
            height: 110px;
            margin: 0 auto;
            border: 1px solid #EBEBEB;
        }

        .slider-banner-image img,
        .slider-nav .slick-slide.thumbnail-image .thumbImg img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .slick-vertical .slick-slide:active,
        .slick-vertical .slick-slide:focus,
        .slick-arrow:hover,
        .slick-arrow:focus {
            border: 0;
            outline: 0;
        }

        .slider-nav .slick-slide.slick-current.thumbnail-image .thumbImg {
            border: 2px solid #196DB6;
        }

        .slider-nav .slick-slide.slick-current span {
            color: #196DB6;
        }

        .slider-nav .slick-slide {
            text-align: center;
        }

        .slider-nav .slick-slide span {
            font-size: 14px;
            display: block;
            padding: 5px 0 15px;
        }

        .slick-arrow {
            width: 100%;
            background-color: transparent;
            border: 0;
            background-position: center;
            background-repeat: no-repeat;
            font-size: 0;
            height: 18px;
            position: absolute;
            left: 0;
            right: 0;
            z-index: 99;
        }

        .slick-prev {
            top: 0;
        }

        .slick-next {
            bottom: 0;
            background-color: #fff;
        }

        .slick-prev.slick-arrow {
            background-image: url(../images/black-up-arrow.png);
        }

        .slick-next.slick-arrow {
            background-image: url(../images/black-down-arrow.png);
        }

        /*End USE CSS for Slider*/

        @media screen and (max-width : 991px) {

            .banner-slider .slider.slider-for,
            .banner-slider .slider.slider-nav {
                max-width: 100%;
                float: none;
            }

            .banner-slider .slider.slider-for {
                padding-right: 0;
            }

            .banner-slider .slider.slider-nav {
                height: auto;
            }

            .slider-banner-image {
                height: 500px;
            }

            .slider.slider-nav.thumb-image {
                padding: 10px 30px 0;
            }

            .slider-nav .slick-slide span {
                padding: 5px 0;
            }

            .slick-arrow {
                padding: 0;
                width: 30px;
                height: 30px;
                top: 50%;
                bottom: 0;
                -webkit-transform: translateY(-50%) rotate(-90deg);
                -moz-transform: translateY(-50%) rotate(-90deg);
                -ms-transform: translateY(-50%) rotate(-90deg);
                transform: translateY(-50%) rotate(-90deg);
            }

            .slick-prev {
                left: 0;
                right: unset;
            }

            .slick-next {
                left: unset;
                right: 0;
                background-color: transparent;
            }

            .vehicle-detail-banner .car-slider-desc {
                max-width: 340px;
            }

            .bid-tag {
                padding: 10px 0 15px;
            }

            .slider.slider-nav.thumb-image {
                white-space: nowrap;
            }

            .thumbnail-image.slick-slide {
                padding: 0px 5px;
                min-width: 75px;
                display: inline-block;
                float: none;
            }
        }

        @media screen and (max-width : 767px) {
            .slider-banner-image {
                height: 400px;
            }

            .slider.slider-nav.thumb-image {
                padding: 0px 20px 0;
                margin: 10px 0px 0;
            }

            .slider-nav .slick-slide.thumbnail-image .thumbImg {
                max-width: 140px;
                height: 80px;
            }

            .slick-prev.slick-arrow {
                background-position: center 10px;
            }

            .slick-next.slick-arrow {
                background-position: center 10px, center;
            }

            .slider-nav .slick-slide span {
                font-size: 12px;
                white-space: normal;
            }
        }

        @media screen and (max-width: 580px) {
            .slider-banner-image {
                height: 340px;
            }
        }

        @media screen and (max-width : 480px) {
            .slider-banner-image {
                height: 280px;
            }
        }

        .detail-group63.n20 img {
            width: inherit;
            height: 100%;
            top: 0;
            right: inherit;
            left: 59%;
            background: url("{{ asset('storage/single_product/' . $sproducts->row_four_image) }}") no-repeat left center;
            background-size: auto;
        }
    </style>

    {{-- @if (!empty($sproducts)) --}}

    <main class="sub">

        <section class="lnb">

            {{-- <a href="/product/productSub.jsp?productCode1=DAP&amp;productCode2=AnUltima" class="btn-back">A&amp;ultima</a> --}}

            <div class="swiper-container v1 swiper-container-initialized swiper-container-horizontal">
                <ul class="swiper-wrapper" style="transition-duration: 0ms;transform: translate3d(762.711px, 0px, 0px);">
                    <li class="swiper-slide">
                        <a id="moveFeature" class="m1 on">Features</a>
                    </li>
                    <li id="designGroupInfo" class="swiper-slide swiper-slide-prev" style="">
                        <a id="moveDesign" href="javascript:void(0);" class="m2">Design</a>
                    </li>
                    <li class="swiper-slide swiper-slide-active">
                        <a id="moveSpecification" href="javascript:void(0);" class="m3">Specification</a>
                    </li>
                </ul>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>

        </section>

        {{-- Product Area Info  --}}
        <section class="sub-visual3 scrollAniTop view">
            <div class="bg">
                <div class="swiper-container">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide">
                            <img src="{{ isset($product->product_image) ? asset($product->product_image) : asset('upload/no_image.jpg') }}"
                                alt="">
                        </li>
                    </ul>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="wrap">
                <p>{{ $product->brand->brand_name }}</p>
                <h1 class="w-25" style="font-size: 50px;width: 31%;"> {{ $product->product_name }} </h1>
                <div class="btn-group tmpProductInfo tmpProductInfo_0 mt-5" style="">
                    <a href="{{ route('template.two.contact') }}" style="cursor:pointer;"
                        class="lnk-ty1 add_to_cart_btn_product_astell" data-product_id="" style="margin-top: 4rem;">Contact
                        To Us</a>
                </div>
                <div class="scroll-icon">
                    Scroll
                    <div class="line"></div>
                </div>
            </div>
        </section>
        {{-- Product Area Info  --}}


        {{-- Row Area Two Start --}}
        @if (
            !empty($sproducts->row_two_image_one) ||
                !empty($sproducts->row_two_image_two) ||
                !empty($sproducts->row_two_image_three) ||
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
        {{-- Row Area Two End  --}}

        {{-- Banner Section   --}}

        {{-- <section class="banner-section">
            <div class="container">
                <div class="vehicle-detail-banner banner-content clearfix">
                    <div class="banner-slider">
                        <div class="slider slider-for">
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                    alt="Car-Image">
                            </div>
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                    alt="Car-Image">
                            </div>
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                    alt="Car-Image">
                            </div>
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                    alt="Car-Image">
                            </div>
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                    alt="Car-Image">
                            </div>
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                    alt="Car-Image">
                            </div>
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                    alt="Car-Image">
                            </div>
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                    alt="Car-Image">
                            </div>
                            <div class="slider-banner-image">
                                <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                    alt="Car-Image">
                            </div>
                        </div>
                        <div class="slider slider-nav thumb-image">
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine1</span>
                            </div>
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine2</span>
                            </div>
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine3</span>
                            </div>
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine1</span>
                            </div>
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine2</span>
                            </div>
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine3</span>
                            </div>
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1570942872213-1242607a35eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine1</span>
                            </div>
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1570171278960-d6c2b316f3b1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine2</span>
                            </div>
                            <div class="thumbnail-image">
                                <div class="thumbImg">
                                    <img src="https://images.unsplash.com/photo-1564376130023-5360fbb7c91b?ixlib=rb-1.2.1&auto=format&fit=crop&w=724&q=80"
                                        alt="slider-img">
                                </div>
                                <span>White Pearl Crystal Shine3</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- Banner Section   --}}

        {{-- Row Area Three Start --}}
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
        {{-- Row Area Three End  --}}

        {{-- @if (!empty($sproducts->row_four_image))
            <section class="detail-group63 scrollAni n20 view">
                <div class="wrap">
                    <div class="inner">
                        <h3>
                            {{ $sproducts->row_four_title }}
                        </h3>
                        <p>
                            Based on its innovative technology and perfect design, the
                            A&amp;ultima SP3000 received the highest praise from audiophiles
                            and media outlets worldwide, for ‘opening a new horizon with
                            overwhelming sound that reaches the pinnacle of digital audio
                            players.’ Astell&amp;Kern sought to commemorate the monumental
                            success of the SP3000 by introducing the SP3000 24K Gold Limited
                            Edition crafted with gold, the most valuable metal in human
                            history.
                            <br><br>
                            Astell&amp;Kern started with the innovative Stainless Steel 904L
                            material used for the first time in the SP3000 and plated it
                            with 24K pure gold to capture the pinnacle sound of the SP3000
                            in a metal of extreme luxury and value.<br>
                            Gold has a beautiful luster, does not rust, and has excellent
                            electrical conductivity, so it is used not only in jewelry, but
                            also as a top-quality component for semiconductors and high-end
                            audio, and is highly valued due to its rarity. However, the
                            highest purity 24K gold is difficult to handle due to its low
                            hardness, so extremely meticulous processes and work were
                            required to complete the SP3000 24K Gold Limited Edition, which
                            has a much larger area than jewelry, into a flawless product.<br>
                            To deliver the highest quality product without compromise,
                            Astell&amp;Kern used a wet process for pure gold plating
                            (plating thickness of 0.5um+/- 20%) rather than simply a surface
                            treatment. To fully highlight the SUS 904L material and gold
                            plating, nickel plating was first applied, followed by the 24K
                            gold plating, and then an AF coating was applied to harden the
                            surface and prevent fingerprints.
                            <br><br>
                            The SP3000 24K Gold Limited Edition is a monumental design that
                            fully expresses Astell&amp;Kern's brand philosophy.<br>
                            Discover a new horizon for premium audio players with the unique
                            beauty of timeless metals, and the amazing sound of the SP3000.
                            The SP3000 24K Gold Limited Edition includes a special leather
                            case and package exclusive to this limited edition.
                        </p>
                    </div>
                    <div class="">
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_four_image) }}" alt="">
                    </div>
                </div>
            </section>
        @endif --}}
        {{-- Row Area Four Start  --}}

        @if (!empty($sproducts->row_four_image))
            <section class="detail-group10 scrollAni n5">

                <div class="bg"
                    style=" background-image: url('{{ asset('storage/single_product/' . $sproducts->row_four_image) }}');">
                </div>

                <div class="wrap">
                    <div class="inner">
                        <h2>
                            {{ $sproducts->row_four_title }}
                        </h2>
                    </div>
                </div>

            </section>
        @endif
        {{-- Row Area End Start  --}}

        {{-- Row Area Five Start  --}}
        @if (!empty($sproducts->row_five_image && $sproducts->row_five_background_image))
            <section class="detail-group17 scrollAni n19 view" style="
            background-image: url('{{ asset('storage/single_product/' . $sproducts->row_five_background_image) }}');
          ">
                <div class="bg"
                    style="
                background-image: url('{{ asset('storage/single_product/' . $sproducts->row_five_image) }}');
              ">
                </div>
                <div class="wrap">
                    <div class="inner">
                        <h3>
                            {{ $sproducts->row_five_title }}
                        </h3>
                        <p>
                            {{ $sproducts->row_five_description }}
                        </p>
                    </div>
                </div>
            </section>
        @endif
        {{-- Row Area Five End  --}}


        {{-- Row Six Area Start  --}}
        @if (!empty($sproducts->row_six_background_image))
            <section class="detail-group29 scrollAni n4 view">
                <div class="bg"
                    style="
                background-image: url('{{ asset('storage/single_product/' . $sproducts->row_six_background_image) }}');
              ">
                </div>
                <div class="wrap">
                    <h2>
                        {{ $sproducts->row_six_title }}
                    </h2>
                    <div class="n4-wrapper">
                        <h3>
                            <span>Material Innovations,</span>
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
        {{-- Row Six Area End  --}}


        {{-- Row Area Seven Start  --}}

        @if (!empty($sproducts->row_seven_background_image))
            <section class="detail-group10 scrollAni n5 view">
                <div class="bg"
                    style="background: #111420 url({{ asset('storage/single_product/' . $sproducts->row_seven_background_image) }});">
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
        {{-- Row Area Seven End  --}}


        {{-- Row Eight Area Start  --}}
        @if (!empty($sproducts->row_eight_image))
            <section class="detail-group10 scrollAni n6">
                <div class="wrap">
                    <img src="{{ asset('storage/single_product/' . $sproducts->row_eight_image) }}" />
                </div>
            </section>
        @endif
        {{-- Row Eight Area End  --}}

        {{-- Row Nine Area Start --}}

        @if (!empty($sproducts->row_nine_background_image) || !empty($sproducts->row_nine_image))
            <section class="detail-group10 scrollAni n7 view">
                <div class="wrap">
                    <h3>
                        <span>{{ $sproducts->row_nine_title }}</span>
                        {{ $sproducts->row_nine_sub_title }}
                    </h3>
                    <p>
                        In order to develop the ultimate audio player that has never been
                        experienced before, not only do we use the latest DAC and
                        technology available, but we use the innovative audio technology
                        of TERATON ALPHA, AK's Ultimate Sound Solution, which has been
                        refined for the SP3000.
                        <br><br>
                        TERATON ALPHA, engineered through endless research, is
                        Astell&amp;Kern's unique technology that has been designed to
                        produce audio playback that is close to the original sound through
                        effective power noise removal, efficient power management and
                        unwavering amplification, and a fully converted audio output
                        interface. HEXA-Audio Circuitry structure and independent dual
                        audio circuit, implemented for the first time in the SP3000, are
                        paired together with TERATON ALPHA's sound solution to create the
                        purest original sound.
                    </p>
                    <a href="../story/story_detail.jsp?storyNo=9&amp;categoryCode=Sound" class="lnk-ty2">Discover more
                    </a>
                    <img src="{{ asset('storage/single_product/' . $sproducts->row_nine_image) }}">
                </div>
            </section>
        @endif
        {{-- Row Nine Area End  --}}
        {{-- Row Area Ten & Eleven Start --}}
        @if (
            !empty($sproducts->row_ten_image_one) ||
                !empty($sproducts->row_ten_image_two) ||
                !empty($sproducts->row_eleven_image))
            <section class="detail-group29 scrollAni n8">
                <div class="wrap">
                    <h3>
                        <span class="text-light">{{ $sproducts->row_ten_title }}</span>
                    </h3>
                    <div class="thumbnail">
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_ten_image_one) }}">
                        <img src="{{ asset('storage/single_product/' . $sproducts->row_ten_image_two) }}">
                    </div>
                    <p>
                        {{ $sproducts->row_ten_description }}
                    </p>
                    <div class="box">

                        <div class="row">
                            <div class="col-6">
                                <h3>
                                    {{ $sproducts->row_eleven_title }}</h3>
                                <p>

                                    {{ $sproducts->row_eleven_description }}
                                </p>
                            </div>
                            <div class="col-6">
                                <img style="width: 500px; height: auto;"
                                    src="{{ asset('storage/single_product/' . $sproducts->row_eleven_image) }}" />
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @endif
        {{-- Row Area Ten & Eleven End  --}}


        {{-- Twelve Area Start  --}}
        <section class="detail-group9 v3 scrollAni n9">
            <div class="wrap">
                <div class="" style="font-size: 20px;">
                    <p>
                        {!! $sproducts->row_twelve_description !!}
                    </p>

                </div>
            </div>
        </section>
        {{-- Tweleve Area End  --}}

        {{-- Thirteen Area Start  --}}
        @if (
            !empty($sproducts->row_thirteen_background_image) ||
                !empty($sproducts->row_thirteen_image_one) ||
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
        {{-- Thirteen Area End  --}}

        {{-- Fourteen Area Start  --}}
        @if (!empty($sproducts->row_fourteen_background_image))
            <section class="detail-group3 scrollAni n11">
                <div class="bg"
                    style="background-image: url('{{ asset('storage/single_product/' . $sproducts->row_fourteen_background_image) }}'); background-color: transparent;background-position: center bottom;">
                </div>

                <div class="wrap">
                    <h3>{{ $sproducts->row_fourteen_title }}</h3>
                </div>
            </section>
        @endif
        {{-- Fourteen Area End  --}}

        {{-- 15 Area Start  --}}
        @if (!empty($sproducts->row_fifteen_image))
            <section class="detail-group4 scrollAni n12">
                <div class="bg"
                    style="background: transparent url('{{ asset('storage/single_product/' . $sproducts->row_fifteen_image) }}') center bottom -20px no-repeat;">
                </div>
                <div class="wrap">
                    <h3>
                        <span>{{ $sproducts->row_fifteen_title }}</span>
                        {{ $sproducts->row_fifteen_sub_title }}
                    </h3>
                    <p>
                        {{ $sproducts->row_fifteen_description }}
                    </p>
                </div>
            </section>
        @endif
        {{-- 15 Area End  --}}

        {{-- 16 Area Start  --}}
        @if (!empty($sproducts->row_sixteen_background_image) || !empty($sproducts->row_sixteen_image))
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
        {{-- 16 Area End  --}}

        {{-- 17 Area Start  --}}


        @if (!empty($sproducts->row_seventeen_image))
            <section class="detail-group19 scrollAni n14" style="background-color: #040802">

                <div class="bg"
                    style="background-image: url({{ asset('storage/single_product/' . $sproducts->row_seventeen_image) }}); background-color: #040802; background-size: cover;">
                </div>

                <div class="wrap">
                    <h3>
                        {{ $sproducts->row_seventeen_title }}
                    </h3>
                </div>
            </section>
        @endif
        {{-- 17 Area End  --}}
        <section class="detail-group9 v3 scrollAni n15 view">
            <div class="wrap">
                <h3>Sound Design With DAC Filters</h3>
                <p>
                    With the SP3000, you can have fun creating your own sound style by
                    selecting various DAC filters provided by the DAC manufacturer.<br>
                    Design your own sound with 6 different DAC filters.
                </p>
            </div>
        </section>

        {{-- 18 Area Start  --}}
        @if (!empty($sproducts->row_eighteen_background_image) || !empty($sproducts->row_eighteen_image))
            <section class="detail-group29 scrollAni n17 view">

                <div class="bg"
                    style="background-image: url('{{ asset('storage/single_product/' . $sproducts->row_eighteen_background_image) }}'); background-size: cover;">
                </div>

                <div class="wrap">
                    <h3>
                        <span>{{ $sproducts->row_eighteen_title }}</span>
                        {{ $sproducts->row_eighteen_sub_title }}
                    </h3>
                    <p>
                        {{ $sproducts->row_eighteen_description }}
                    </p>
                    {{-- <img class="text-center"
                        src="{{ asset('storage/single_product/' . $sproducts->row_eighteen_image) }}" /> --}}
                </div>
            </section>
        @endif
        {{-- 18 Area Start  --}}

        {{-- 19 Area Start  --}}
        @if (
            !empty($sproducts->row_nineteen_image_one) ||
                !empty($sproducts->row_nineteen_image_two) ||
                !empty($sproducts->row_nineteen_image_three))
            <section class="detail-group15 scrollAni n18 view">
                <div class="wrap text-center">
                    <div class="inner">
                        <h3>{{ $sproducts->row_nineteen_title }}</h3>
                        <p style="text-align: center;padding-right: 0px;">
                            {{ $sproducts->row_nineteen_description }}
                        </p>
                    </div>
                </div>
            </section>
        @endif
        {{-- 19 Area End  --}}


        {{-- Feature Area Start  --}}

        @if (
            !empty($sproducts->feature_section_background_image) ||
                !empty($sproducts->feature_one_image) ||
                !empty($sproducts->feature_two_image) ||
                !empty($sproducts->feature_three_image) ||
                !empty($sproducts->feature_four_image) ||
                !empty($sproducts->feature_five_image) ||
                !empty($sproducts->feature_six_image))
            <section class="detail-group8 scrollAni n19">

                <div class="bg"
                    style="background-image: url('{{ asset('storage/single_product/' . $sproducts->feature_section_background_image) }}');">
                </div>

                <div class="wrap">
                    <div class="inner">

                        <div class="row">

                            <div class="col-6">
                                <div class="item">

                                    <img style="width: 80px; height: 80px;display: flex;"
                                        src="{{ asset('storage/single_product/' . $sproducts->feature_one_image) }}" />

                                    <h4>{{ $sproducts->feature_one_title }}</h4>
                                    <p>
                                        {{ $sproducts->feature_one_description }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="item">
                                    <img style="width: 80px; height: 80px;display: flex;"
                                        src="{{ asset('storage/single_product/' . $sproducts->feature_two_image) }}" />
                                    <h4>{{ $sproducts->feature_two_title }}</h4>
                                    <p>
                                        {{ $sproducts->feature_two_description }}
                                    </p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="item">
                                    <img style="width: 80px; height: 80px;display: flex;"
                                        src="{{ asset('storage/single_product/' . $sproducts->feature_three_image) }}" />
                                    <h4>{{ $sproducts->feature_three_title }}</h4>
                                    <p>
                                        {{ $sproducts->feature_three_description }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="item">
                                    <img style="width: 80px; height: 80px;display: flex;"
                                        src="{{ asset('storage/single_product/' . $sproducts->feature_four_image) }}" />

                                    <h4>{{ $sproducts->feature_four_title }}</h4>
                                    <p>
                                        {{ $sproducts->feature_four_description }}
                                    </p>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="item">
                                    <img style="width: 80px; height: 80px;display: flex;"
                                        src="{{ asset('storage/single_product/' . $sproducts->feature_five_image) }}" />

                                    <h4>{{ $sproducts->feature_five_title }}</h4>
                                    <p>
                                        {{ $sproducts->feature_five_description }}
                                    </p>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="item">
                                    <img style="width: 80px; height: 80px;display: flex;"
                                        src="{{ asset('storage/single_product/' . $sproducts->feature_six_image) }}" />

                                    <h4>{{ $sproducts->feature_six_title }}</h4>
                                    <p>
                                        {{ $sproducts->feature_six_description }}
                                    </p>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>
        @endif
        {{-- Feature Area End  --}}
        <section class="detail-group63 scrollAni n21" style="background-color: #f0f0f0">
            <div class="wrap">
                <div class="img">
                    <img src="https://cdn.astellnkern.com/editor/img/202208/20220831141927_e0b9b935-f491-4d4c-a256-19cf639e9a18.png"
                        alt="img" style="max-width: 320px">
                </div>
                <div class="inner">
                    <h3 style="color: #000000">Premium Goat Leather Case</h3>
                    <p style="color: #000000">
                        The SP3000 comes with a French goatskin leather case to protect
                        and highlight the beauty of the 904L stainless steel body.
                        <br><br>
                        The case is made by ALRAN, located in Tarn in southern France, a
                        historical tannery that was established in 1903 and has been
                        manufacturing leather for over 100 years. It is one of the
                        world’s leading tanneries, well-known for their natural leather
                        manufacturing technology since the 1980’s. ALRAN is recognized
                        as the best goatskin manufacturer and supplies other leading
                        luxury brands such as H and L.
                        <br><br>
                        The leather case included with the SP3000 is developed with
                        ALRAN Tannery's unique Hand-Boarding technology. This is a
                        technology that processes the leather by rubbing it in various
                        directions using wooden planks, so you can feel the texture of
                        the surface. This process is unique compared to how other
                        goatskin cases are produced.
                    </p>
                </div>
            </div>
        </section>
        {{-- Feature Area End  --}}
        @if (
            !empty($sproducts->design_section_image_one) ||
                !empty($sproducts->design_section_image_two) ||
                !empty($sproducts->design_section_image_three) ||
                !empty($sproducts->design_section_image_four))
            <section class="design-group scrollAni n12">
                <div class="wrap" style="padding: 75px 0px 75px;">
                    <h3>{{ $sproducts->design_section_title }}</>
                        <p>
                            {{ $sproducts->design_section_description }}
                        </p>
                    </h3>
                </div>
            </section>
        @endif
        {{-- Design Area End  --}}
        <section class="dropdown-list">
            <div class="wrap">
                <h3>Specification</h3>
                <ul>

                    <li>
                        <a href="javascript:void(0)">Overview</a>
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

                    <li>
                        <a href="javascript:void(0)">Short Description</a>
                        <div class="cont">
                            <ul>
                                {!! $product->short_desc !!}
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </section>
    </main>
    {{-- @else
        <p>No Content</p>
    @endif --}}
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>

    {{-- add_to_cart_btn_product --}}
    <script>
        $('.add_to_cart_btn_product_astell').click(function() {

            var product_id = $(this).data('product_id');
            //var qty = $(this).closest('.d-flex').find('.qty-input').val();


            $.ajax({

                type: "POST",
                dataType: 'json',
                url: '/product-store-cart-product',

                data: {
                    product_id: product_id,
                    // qty: qty,
                },

                success: function(data) {

                    $('.cart_icon').removeClass('d-none');

                    miniCart();
                    miniCartRelated();

                    // Start Message

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',

                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {

                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success,
                        })

                        // window.location.href = '/template.one.view.cart';

                    } else {

                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error,
                        })
                    }

                    // End Message
                }

            })

        })
    </script>
    {{-- add_to_cart_btn_product --}}
@endpush
