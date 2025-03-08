@extends('frontend.astell.frontend_dashboard_astell')
@section('index_astell')
    <style>
        .astel-product-tabs {
            display: block;
            height: 86px;
            line-height: 75px;
            text-align: center;
            color: #888;
            font-size: 15px;
            font-weight: 300;
            letter-spacing: 0.75px;
            border: 0;
            background-color: #fff;
        }

        .tab-links li {
            display: inline-block;
            width: 25%;
            border-right: 1px solid #e6e6e6;
        }

        .nav-tabs .astel-product-tabs.show .astel-product-tabs-link,
        .nav-tabs .astel-product-tabs-link.active {
            display: inline-block;
            width: 100%;
            height: 86px;
            border: 0;
            background-color: #f4ece8;
        }

        .astel-product-tabs-link {
            display: inline-block;
            width: 100%;
            height: 86px;
            color: #888;
            border: 0;
        }

        .nav-tabs .astel-product-tabs-link:focus,
        .nav-tabs .astel-product-tabs-link:hover {
            border: 0px !important;
            outline: none !important;
        }

        .tab-links .astel-product-tabs-link {
            border: 0px !important;
            outline: none !important;
        }

        .swiper-container {
            overflow: hidden;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .swiper-container-wrapper {
            height: 100vh;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #000;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
            display: flex;
            flex-flow: column nowrap;
            justify-content: center;
            align-items: center;
        }

        .gallery-top {
            position: relative;
            width: 100%;
            height: 75vh;
        }

        .gallery-thumbs {
            width: 100%;
            padding-top: 10px;
        }

        .gallery-thumbs .swiper-slide {
            width: 25%;
            flex-flow: row nowrap;
            height: 100%;
            opacity: 0.75;
            cursor: pointer;
            position: relative;
        }

        .gallery-thumbs .swiper-slide img {
            width: 100%;
        }

        .gallery-thumbs .swiper-slide .thumb-text {
            position: absolute;
            bottom: 10px;
            left: 10px;
            color: white;
            background: rgba(0, 0, 0, 0.5);
            padding: 5px;
            border-radius: 3px;
            font-size: 14px;
        }

        .gallery-thumbs .swiper-slide .thumb-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .gallery-thumbs .swiper-slide .thumb-description {
            font-size: 14px;
        }

        @media (min-width: 480px) {
            .gallery-thumbs .swiper-slide {
                flex-flow: column nowrap;
                width: 100%;
            }
        }

        .gallery-thumbs .swiper-slide-thumb-active {
            opacity: 1;
            background-color: #f4ece8;
        }

        .wr strong {
            display: block;
            font-size: 56px;
            font-weight: 500;
        }

        .swiper-containerss {
            width: 100%;
            height: 100%;
        }

        .swiper-container-bottom {
            text-align: center;
            font-size: 18px;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .swiper-button-prev,
        .swiper-container-rtl .swiper-button-next {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z' fill='%23000000'%3E%3C/path%3E%3C/svg%3E");
            left: 10px;
            right: auto;
        }

        .swiper-button-next {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 27 44'%3E%3Cpath d='M27,22L5,44l-2.1-2.1L22.8,22L2.9,2.1L5,0L27,22L27,22L27,22z' fill='%23000000'%3E%3C/path%3E%3C/svg%3E");
            right: 10px;
            left: auto;
        }
    </style>

    <main class="main">
        {{-- Home Video Section Start  --}}
        @include('frontend.astell.home_page.home_video')
        {{-- Home Video Section End  --}}
        {{-- Image Banner Section Start  --}}
        @include('frontend.astell.home_page.image_banner')
        {{-- Image Banner Section End  --}}

        @include('frontend.astell.home_page.category')

        {{-- Product Image Section Start  --}}
        @include('frontend.astell.home_page.product_image_banner')
        {{-- Product Image Section End  --}}

        {{-- Home Page Banner Section Start  --}}
        @include('frontend.astell.home_page.fotter-top-slider')
        {{-- Home Page Banner Section End  --}}



    </main>
@endsection
