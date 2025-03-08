@extends('frontend.template_one.frontend_dashboard_template_one')

@section('index_template_one')
@section('title')
    DadaBhaai | Compare
@endsection
<style>
    .cd-features-list li {
        padding: 10px 40px;
        border: 1px solid #dee2e6;
        border-bottom: 0;
        border-left: 0;
    }

    .sidebar-text-compare {
        font-weight: bolder;
    }

    .compare-title {
        font-size: 1rem;
        margin-bottom: 0px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .top-info {
        position: relative;
        height: 225px;
        text-align: center;
        border-right: 1px solid #dee2e6;
        padding: 2.25em 2.5em;
        -webkit-transition: height 0.3s;
        -moz-transition: height 0.3s;
        transition: height 0.3s;
        cursor: pointer;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .compare-product-img {
        width: 150px;
        height: 150px;
        object-fit: contain;
    }
</style>

<!-- page banner area start -->
<section class="page-banner-area blog-page"
    data-background="{{ asset('frontend/template_one/assets/img/bg/banner.jpg') }}" style="height: 200px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <div class="banner-text text-center pt-50 pb-50">
                        <h2 class="f-800 cod__black-color">
                            Compare <span class="grenadier-color">Product</span>
                        </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb pt-3">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item grenadier-color active" aria-current="page">
                                    <a href="">
                                        <span class="grenadier-color">Compare</span>
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Compare List  --}}
<section>
    <div class="container py-5">
        <div class="row g-0">
            <div class="col-lg-2 px-0 pr-0">
                {{-- Sidebar Column --}}
                <div>
                    <ul class="cd-features-list border sidebar-text-compare" style="background: #e8e9eb;">
                        <li style="height: 225px;align-items: center; display: flex;">Product Image</li>
                        <li>Product Name</li>
                        <li>Price</li>
                        <li>Add To Cart</li>
                        <li>Remove</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-10">

                {{-- <div class="row no-product-compare" id="compare"></div> --}}

                <div class="row no-product-compare">

                    @forelse ($cartCompares as $cartCompare)
                        <div class="px-0 col-lg-3"
                            style="border-top: 1px solid #dee2e6;border-bottom: 1px solid #dee2e6;">

                            <div class="top-info">
                                <img class="img-fluid compare-product-img"
                                    src="{{ asset($cartCompare->options->image) }}" alt="">
                            </div>

                            <ul class="text-center cd-features-list">
                                <li>
                                    <h3 class="compare-title" title="{{ $cartCompare->name }}">{{ $cartCompare->name }}
                                    </h3>
                                </li>
                                <li>$ {{ $cartCompare->price }}</li>

                                <li>
                                    @if ($cartCompare->price > 0)
                                        <a type="submit" style="cursor:pointer" id="{{ $cartCompare->id }}"
                                            onclick="addToCartCompare(this.id)"> Add To Cart</a>
                                    @else
                                        <a class="text-danger">Product Price is empty</a>
                                    @endif
                                </li>

                                <li><a type="submit" style="cursor:pointer" id="{{ $cartCompare->rowId }}"
                                        onclick="compareRemove(this.id)"><i
                                            class="fa-solid fa-trash text-danger"></i></a>
                                </li>

                            </ul>

                        </div>
                    @empty
                        <div class="text-center"
                            style="width: 100%; position: absolute; top: 50%; transform: translateY(-50%);">
                            <p class="text-danger">Compare list is empty</p>
                        </div>
                    @endforelse

                </div>


            </div>


        </div>
    </div>
</section>
{{-- Compare List  --}}

@endsection
