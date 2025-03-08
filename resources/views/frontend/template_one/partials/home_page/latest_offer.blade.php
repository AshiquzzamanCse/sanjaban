@php
    $offercats = App\Models\Admin\OfferCategory::where('status', '1')->inRandomOrder()->first();
    $products = [];

    // Check if $offercats is not null before querying for products
    if ($offercats) {
        $products = App\Models\Admin\Offer::where('status', '1')
            ->where('offer_category_id', $offercats->id)
            ->get();
    }
@endphp


@if ($offercats && count($products) > 0)
    <div class="product pt-50 pb-40">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-9 col-sm-6">
                    <div class="product-section mb-20">
                        <h6 class="product--section__title f-800 white-color grenadier-bg">
                            Offer
                        </h6>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-sm-6">
                    <div class="all__product--link text-right mb-20">
                        <a class="all-link" href="shop-page.html">Discover All Products<span
                                class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div> --}}
            </div>
            <div class="row align-items-center">
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="small__banner mb-30">
                        <div class="small__banner--thumb position-relative">
                            <a href="javascript:;">

                                <img src="{{ !empty($offercats->icon_image) ? url('storage/offer_category_image/' . $offercats->icon_image) : url('https://ui-avatars.com/api/?size=500&background=random&color=fff&rounded=false&name=' . urlencode($offercats->offer_category_name)) }}"
                                    alt="" width="500" height="300" />

                            </a>

                            <div class="small__banner--content text-center">
                                <span class="f-300 text-white">{{ $offercats->offer_category_name }}</span>
                                {{-- <h2 class="f-800 white-color">60% Flate</h2> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="product__active--small owl-carousel mb-30">

                        @forelse ($products as $product)
                            <div class="product-grid mr-4">
                                <div class="product-image">
                                    <a href="javascript:;" class="image">

                                        <img title="{{ $product->products->product_name }}" class="img product_id"
                                            src="{{ asset($product->products->product_image) }}" alt=""
                                            data-id="{{ $product->products->id }}" style="width:100%; height: 300px;" />

                                    </a>


                                    @php
                                        $amount = $product->price - $product->discount_price;
                                        $discount = ($amount / $product->price) * 100;
                                    @endphp

                                    <span class="product-discount-label">{{ round($discount) }} %</span>

                                    <ul class="product-links">

                                        <li><a type="submit" class="add_to_wishlist" style="cursor: pointer;"
                                                data-product_id="{{ $product->products->id }}" data-tip="Wishlist"><i
                                                    class="far fa-heart"></i></a></li>

                                        <li><a type="submit" style="cursor:pointer;" class="add_to_compare"
                                                data-product_id="{{ $product->products->id }}" data-tip="Compare"><i
                                                    class="fas fa-random"></i></a></li>
                                    </ul>

                                </div>

                                <div class="product-content row align-items-center">

                                    <div class="col-lg-8">
                                        <span class="cate-name">{{ $offercats->offer_category_name }}</span>

                                        <h6 title="{{ $product->products->product_name }}"
                                            class="product__title mine__shaft-color f-700 mb-0 text-start">
                                            <a href="javascript:;" title="{{ $product->products->product_name }}">
                                                {{ substr($product->products->product_name, 0, 25) }}
                                            </a>
                                        </h6>

                                    </div>



                                    <div class="col-lg-4">
                                        <div class="price text-end">

                                            @if ($product->discount_price !== null)
                                                <h5 class="grenadier-color mb-0 fw-bold">
                                                    $ {{ $product->discount_price }}
                                                </h5>
                                            @endif


                                        </div>
                                    </div>

                                </div>

                                <div>
                                    {{-- <a type="submit" style="cursor:pointer;" class="add-cart add_to_cart_btn_product"
                                        data-product_id="{{ $product->id }}">Add to cart</a> --}}

                                    <a type="submit" style="cursor:pointer;"
                                        data-offer_price="{{ $product->discount_price }}"
                                        data-product_id="{{ $product->products->id }}"
                                        class="add-cart add-to-cart add_to_cart_btn"> Add To Cart</a>
                                </div>

                            </div>

                        @empty
                            <p>No Product Avaiable</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
