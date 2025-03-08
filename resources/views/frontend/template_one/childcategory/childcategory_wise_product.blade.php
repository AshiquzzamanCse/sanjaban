@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
@section('title', 'Dada Bhaai | ' . $childcatwiseproduct->childcategory_name)
<!-- shop area start -->
<div class="product shop-page pt-30 pb-80" style="margin-top: 60px;">
    <div class="container">
        <div class="row">

            @include('frontend.template_one.partials.frontend_sidebar')

            <div class="col-lg-9 order-1 order-lg-2">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="shop-banner-bg pt-120 pb-120 mb-50"
                            data-background="{{ asset('storage/childcategory/' . $childcatwiseproduct->childcategory_image) }}">
                            {{-- <div class="collection-text">
                                    <h5 class="f-800"><a href="javascript:;">ChildCategory</a></h5>
                                    <span class="f-200 mb-40">{{ $childcatwiseproduct->childcategory_name }}</span>
                                    <div class="product-countdown-three">
                                        <div class="time-count-deal">
                                            <div class="countdown-list" data-countdown="2020/12/01"></div>
                                        </div>
                                    </div>
                                </div> --}}
                        </div>
                    </div>
                </div>
                <div class="border-b">
                    <div class="row align-items-center mx-0" style="background: #f5f5f5;">
                        <div class="col-lg-4">
                            <div class="shop-bar d-flex align-items-center">
                                <h4 class="f-800 cod__black-color mb-0">Product</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ $childcatwiseproduct->childcategory_name }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>

                        {{-- New Section  --}}
                        <div class="col-lg-6">
                            <!-- Actual search box -->
                            <div class="form-group has-search mb-0">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="fa fa-search form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="d-flex justify-content-end">
                                <select name="" id="sortBy">
                                    <option selected disabled>Sort By Product</option>
                                    <option value="nameAtoZ" {{ $sort == 'nameAtoZ' ? 'selected' : '' }}>Product
                                        Name: A to Z
                                    </option>
                                    <option value="nameZtoA" {{ $sort == 'nameZtoA' ? 'selected' : '' }}>Product
                                        Name: Z to A
                                    </option>
                                </select>
                            </div>
                        </div>
                        {{-- New Setion  --}}
                    </div>
                </div>
                <div class="row mt-30">
                    @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="product-grid mb-4">
                                <div class="product-image">
                                    <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"
                                        class="image">

                                        <img title="{{ $product->product_name }}"
                                            src=" {{ asset($product->product_image) }}"
                                            data-tip="{{ $product->product_name }}" style="width:100%; height: 300px;">
                                    </a>

                                    {{-- <span class="product-discount-label">New</span> --}}

                                    <ul class="product-links">

                                        <li><a type="submit" class="add_to_wishlist" style="cursor: pointer;"
                                                data-product_id="{{ $product->id }}" data-tip="Wishlist"><i
                                                    class="far fa-heart"></i></a></li>

                                        <li><a type="submit" style="cursor:pointer;"
                                                data-product_id="{{ $product->id }}" data-tip="Compare"><i
                                                    class="fas fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content d-flex justify-content-between align-items-center">
                                    <div>
                                        <span><a class="text-muted"
                                                href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->brand->brand_name }}</a>
                                        </span>
                                        <h3 title="{{ $product->product_name }}" class="title font-weight-bold"><a
                                                href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ substr($product->product_name, 0, 25) }}</a>
                                        </h3>
                                    </div>

                                    {{-- <div class="price font-weight-bold pr-2">
                                        @if ($product->price_status == 'rfq')
                                            <h6 class="grenadier-color mb-0 font-weight-bold">
                                                $ {{ $product->sas_price }}
                                            </h6>
                                        @elseif ($product->price_status == 'offer_price')
                                            <del>$ {{ $product->price }}</del>
                                            <h6 class="grenadier-color mb-0 font-weight-bold">$
                                                {{ $product->discount_price }}
                                            </h6>
                                        @elseif ($product->price_status == 'price')
                                            <h6 class="grenadier-color mb-0 font-weight-bold">
                                                $ {{ $product->price }}
                                            </h6>
                                        @endif
                                    </div> --}}

                                    <div class="price font-weight-bold pr-2">
                                        @if ($product->price_status == 'rfq' && !is_null($product->sas_price))
                                            <h6 class="grenadier-color mb-0 font-weight-bold">$
                                                {{ $product->sas_price }}</h6>
                                        @elseif ($product->price_status == 'offer_price' && !is_null($product->price) && !is_null($product->discount_price))
                                            <del>$ {{ $product->price }}</del>
                                            <h6 class="grenadier-color mb-0 font-weight-bold">$
                                                {{ $product->discount_price }}</h6>
                                        @elseif ($product->price_status == 'price' && !is_null($product->price))
                                            <h6 class="grenadier-color mb-0 font-weight-bold">$ {{ $product->price }}
                                            </h6>
                                        @endif
                                    </div>

                                </div>

                                {{-- <div>
                                    <a type="submit" style="cursor:pointer;" class="add-cart add_to_cart_btn_product"
                                        data-product_id="{{ $product->id }}">Add to cart</a>
                                </div> --}}

                                @if ($product->sas_price !== null || $product->price !== null || $product->discount_price !== null)
                                    <a type="submit" style="cursor:pointer;" class="add-cart add_to_cart_btn_product"
                                        data-product_id="{{ $product->id }}">Add to cart</a>
                                @else
                                    <a href="{{ route('template_one.contact') }}" class="add-cart">Contact Us</a>
                                @endif

                            </div>
                        </div>
                    @empty
                        <p class="text-dander">No Product Avaiable</p>
                    @endforelse

                </div>

                <div class="row mt-10">
                    <div class="col-sm-12">
                        <div class="common-pagination">
                            {{ $products->links('vendor.pagination.template_one') }}
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- shop area end -->

<!-- Subscribe -->

{{-- <div class="subscribe subscribe--area grenadier-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="newsletter newsletter--box d-flex justify-content-between align-items-center pos-rel">
                        <div class="left d-flex justify-content-between align-items-center">
                            <div class="newsletter__title">
                                <span class="notification--icon"><img src="img/icon/notification-icon.png"
                                        alt="notification"></span>
                                <span class="notification__title--heading f-800 white-color">Subscribe for Join Us!</span>
                            </div>
                            <div class="newsletter--message d-none d-xl-block">
                                <p class="newsletter__message__title mb-0">.... & receive $20 coupne for first Shopping &
                                    free delivery.</p>
                            </div>
                        </div>
                        <form class="right newsletter--form pos-rel">
                            <input class="newsletter--input" type="text" placeholder="Enter Your Email Address ...">
                            <button class="btn newsletter--button" type="button"><img src="img/icon/plan-icon.png"
                                    alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

<!-- Subscribe End -->
@endsection

@section('childcatscripts')
<script>
    $('#sortBy').change(function(e) {
        e.preventDefault();
        let sortBy = $('#sortBy').val();
        window.location = "{{ url('' . $route . '') }}/{{ $childcatId }}/{{ $childcatSlug }}?sort=" +
            sortBy;

    });
</script>
@endsection
