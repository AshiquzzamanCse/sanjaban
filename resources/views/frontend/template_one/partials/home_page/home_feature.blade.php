@php

    $products = App\Models\Admin\Product::where('status', '1')
        ->where('feature', '1')
        ->orderBy('id', 'DESC')
        ->limit(4)
        ->latest()
        ->get();

@endphp


@if (count($products) > 0)
    <div class="product pt-0 feature-h-one">

        <div class="container">

            <div class="row align-items-center justify-content-between">
                <div class="col-lg-9 col-sm-6">
                    <div class="product-section mb-30">
                        <h6 class="product--section__title f-800 white-color grenadier-bg">
                            Featured Product
                        </h6>
                    </div>
                </div>

                {{-- <div class="col-lg-3 col-sm-6">
                    <div class="all__product--link text-right mb-30">
                        <a class="all-link" href="shop-collection.html">Discover All Products<span
                                class="lnr lnr-arrow-right"></span></a>
                    </div>
                </div> --}}

            </div>

            {{-- Latest Product Item  --}}
            <div class="row gx-1">

                @forelse ($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-grid mb-4">
                            <div class="product-image">
                                <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"
                                    class="image">

                                    <img src=" {{ asset($product->product_image) }}"
                                        data-tip="{{ $product->product_name }}" title="{{ $product->product_name }}"
                                        style="width:100%; height: 300px;">
                                </a>

                                {{-- <span class="product-discount-label">New</span> --}}

                                <ul class="product-links">

                                    <li><a type="submit" class="add_to_wishlist" style="cursor: pointer;"
                                            data-product_id="{{ $product->id }}" data-tip="Wishlist"><i
                                                class="far fa-heart"></i></a></li>

                                    <li><a type="submit" style="cursor:pointer;" class="add_to_compare"
                                            data-product_id="{{ $product->id }}" data-tip="Compare"><i
                                                class="fas fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="product-content d-flex justify-content-between align-items-center">
                                <div>
                                    <span><a class="text-muted"
                                            href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->brand->brand_name }}</a>
                                    </span>
                                    <h3 class="title font-weight-bold" title="{{ $product->product_name }}"><a
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
                                    @if ($product->sas_price !== null || $product->price !== null || $product->discount_price !== null)
                                        @if ($product->price_status == 'rfq' && $product->sas_price !== null)
                                            <h6 class="grenadier-color mb-0 font-weight-bold">
                                                $ {{ $product->sas_price }}
                                            </h6>
                                        @elseif ($product->price_status == 'offer_price' && $product->price !== null && $product->discount_price !== null)
                                            <del>$ {{ $product->price }}</del>
                                            <h6 class="grenadier-color mb-0 font-weight-bold">$
                                                {{ $product->discount_price }}</h6>
                                        @elseif ($product->price_status == 'price' && $product->price !== null)
                                            <h6 class="grenadier-color mb-0 font-weight-bold">
                                                $ {{ $product->price }}
                                            </h6>
                                        @endif
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
                    <p>No Product Avaiable</p>
                @endforelse

            </div>
            {{-- Latest Product Item  --}}

        </div>
    </div>
@endif
