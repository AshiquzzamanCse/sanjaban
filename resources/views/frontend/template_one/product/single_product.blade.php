@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
@section('title', 'Dada Bhaai | Product Details')
<!-- Main -->
<main class="main--wrapper">

    <!-- Shop-details start -->
    <section class="shop-details-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="shop-bred pt-35 pb-35">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:;">{{ optional($product->category)->category_name }}</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="javascript:;">{{ optional($product->subcategory)->subcategory_name }}</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a href="javascript:;" class="active"
                                        style="color: #CD3301">{{ optional($product->childcategory)->childcategory_name }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <div class="order-1 col-lg-12 col-md-6 order-lg-1">
                            <div class="pro-img">
                                <div class="tab-content" id="myTabContent">
                                    @forelse ($multiImages as $key => $multiImage)
                                        <div class="tab-pane fade show {{ $key == 0 ? 'active' : '' }}"
                                            id="multiImg{{ $multiImage->id }}" role="tabpanel"
                                            aria-labelledby="home-tab5">
                                            <img src="{{ asset($multiImage->multi_image) }}" class="mb-2 img-fluid"
                                                alt="" style="width:100%; height: 100%;" />
                                        </div>
                                    @empty
                                        <img src="{{ asset('upload/no_image.jpg') }}" class="mb-2 img-fluid"
                                            alt="" style="width:100%; height: 400px;" />
                                    @endforelse
                                </div>
                                <ul class="nav" id="myTab1" role="tablist">
                                    @forelse ($multiImages as $key => $multiImage)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" id="home-tab5"
                                                data-toggle="tab" href="#multiImg{{ $multiImage->id }}" role="tab"
                                                aria-controls="home5" aria-selected="true">
                                                <img src="{{ asset($multiImage->multi_image) }}" class="img-fluid"
                                                    alt=""
                                                    style="width: 100px;height: 100px;background-size: cover;object-fit: contain;" />
                                            </a>
                                        </li>
                                    @empty
                                        <img src="{{ asset('upload/no_image.jpg') }}" class="img-fluid" alt=""
                                            style="width: 75px;height: 75px; " />
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <div class="row gx-0">

                        <div class="order-3 col-lg-7 col-md-12 order-lg-2">
                            <div class="pro-content">
                                <span>{{ optional($product->brand)->brand_name }}</span>

                                <h5 class="title" id="dpname">
                                    {{ $product->product_name }}
                                </h5>

                                <div class="pro-code">
                                    <ul class="d-flex flex-column justify-content-between">
                                        <li>SKU: <span class="ml-1 mr-2">{{ $product->sku_code }}</span>MF Code:
                                            <span class="ml-1 mr-2">{{ $product->mf_code }}</span>
                                        </li>

                                    </ul>

                                    <p>{!! $product->short_desc !!}</p>
                                </div>

                            </div>
                        </div>

                        {{-- ================================ --}}

                        {{-- @if ($product->price_status == 'price' && $product->price > 0) --}}
                        <div class="order-2 col-lg-5 col-md-6 order-lg-3">

                            <div class="cart-wrapper">
                                <div class="cart-title">
                                    <h6>
                                        Availability: <span class="text-danger"></span>
                                    </h6>
                                </div>
                                <div class="mb-20 price mt-15 d-flex align-items-center">
                                    <div class="mr-3 w-50">
                                        @if ($product->price_status == 'rfq')
                                            <h5 class="mb-0 text-danger">
                                                <span id="productPrice"
                                                    style="color: #CD3301; font-weight: bold; margin-bottom: 0;">$
                                                    {{ $product->sas_price }}</span>
                                            </h5>
                                        @elseif ($product->price_status == 'offer_price')
                                            <p class="mb-0"><del>$ <span
                                                        id="originalPrice">{{ $product->price }}</span></del>
                                            </p>
                                            <h5 class="mb-0 text-danger">
                                                <span id="productPrice"
                                                    style="color: #CD3301; font-weight: bold; margin-bottom: 0;">{{ $product->discount_price }}</span>
                                            </h5>
                                        @elseif ($product->price_status == 'price')
                                            <h5 class="mb-0 text-danger">
                                                <span id="productPrice"
                                                    style="color: #CD3301; font-weight: bold; margin-bottom: 0;">
                                                    {{ $product->price }}</span>
                                            </h5>
                                        @endif

                                    </div>


                                    <div class="mb-0 field w-50 text-end">
                                        <label class="mb-0">Quantity:</label>
                                        <div class="number d-flex align-items-center main_qty">
                                            <p class="px-2 mb-0 minus">-</p>
                                            <input type="text" class="mb-0 w-50 qty-input-product" name=""
                                                value="1" min="1" autocomplete="off" id="dqty">
                                            <p class="px-2 mb-0 plus">+</p>
                                        </div>
                                    </div>


                                </div>

                                <div class="mb-4">
                                    <ul id="productList" style="list-style-type: circle !important;"></ul>
                                </div>

                                @if ($product->sas_price !== null || $product->price !== null || $product->discount_price !== null)
                                    <div class="d-flex align-items-center">

                                        <input type="hidden" name="parent_id" id="oneproduct_id"
                                            value="{{ $product->id }}">

                                        <a onclick="buyToCartOne()" class="cart-button w-100 add-to-card-btns">Add
                                            Cart</a>

                                        {{-- <a class="mt-0 ml-3 cart-button w-100">Buy</a> --}}

                                    </div>
                                @else
                                    <a href="{{ route('template_one.contact') }}"
                                        class="cart-button w-100 add-to-card-btns">Contact Us</a>
                                @endif


                                <div class="last align-items-center d-flex justify-content-center">
                                    <a style="cursor: pointer;" data-product_id="{{ $product->id }}"
                                        class="ml-2 mr-2 f-700 grenadier-color add_to_wishlist">Add To Wishlist</a>
                                    |
                                    <a style="cursor: pointer;" type="submit" data-product_id="{{ $product->id }}"
                                        class="ml-2 f-700 grenadier-color add_to_compare">Compare</a>
                                </div>

                            </div>

                        </div>
                        {{-- @endif --}}

                    </div>

                    <div class="mb-3 row">
                        <div class="row align-items-center">
                            <div class="col-xl-12 col-sm-12">
                                <div class="mt-40 product-section2">
                                    <h6 class="product--section__title2 pb-30" id="releted-tab" data-toggle="tab"
                                        href="#releted" role="tab" aria-controls="releted" aria-selected="true">
                                        <span>Releted </span> Accessories Of This Product
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="px-0 col-lg-12">
                            <div class="releted_accessories">
                                @forelse ($relativeChild as $childproduct)
                                    @if (!empty($childproduct->product_image))
                                        <div class="mx-2 border-0 shadow-none card releted-accessories-items">
                                            <div class="p-0 bg-white border-0 card-header">
                                                <img src="{{ asset($childproduct->product_image) }}"
                                                    class="img-fluid accesories-img"
                                                    style="width: 100%; height: 140px;" alt="" />
                                            </div>
                                            <div class="p-0 card-body">
                                                <div class="container">
                                                    <div class="p-1 row align-items-center"
                                                        style="background-color: #eee">
                                                        <div class="p-2 col-lg-6">
                                                            <small id="drpname"
                                                                class="text-black">{{ substr($childproduct->product_name, 0, 9) }}</small>
                                                        </div>
                                                        <div class="p-2 col-lg-6">
                                                            <div class="text-right">
                                                                @if ($childproduct->price_status == 'rfq')
                                                                    <small class="mb-0 grenadier-color fw-bold">$
                                                                        {{ $childproduct->sas_price }}</small>
                                                                @elseif ($childproduct->price_status == 'offer_price')
                                                                    <del>$ {{ $childproduct->price }}</del>
                                                                    <small class="mb-0 grenadier-color fw-bold">$
                                                                        {{ $childproduct->discount_price }}</small>
                                                                @elseif ($childproduct->price_status == 'price')
                                                                    <small class="mb-0 grenadier-color fw-bold">$
                                                                        {{ $childproduct->price }}</small>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="px-2 col-lg-12"
                                                            style="border-top: 1px solid white;padding-top: 5px;">
                                                            <div
                                                                class="pt-2 d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <small>
                                                                        <a style="cursor: pointer"
                                                                            data-product_id="{{ $childproduct->id }}"
                                                                            data-product_name="{{ $childproduct->product_name }}"
                                                                            data-product_price="{{ $childproduct->price }}"
                                                                            class="add_to_cart_btn_product_single_add rounded-0">
                                                                            <span
                                                                                class="p-2 text-white badge rounded-0"
                                                                                style="background-color: #cd3301;">
                                                                                <i class="fa-solid fa-plus"></i> Add
                                                                                Cart
                                                                            </span>
                                                                        </a>
                                                                    </small>
                                                                </div>

                                                                <!-- Quantity Box -->
                                                                <div class="number d-flex align-items-center">
                                                                    <button type="button"
                                                                        style="cursor: pointer;height: 24px;"
                                                                        class="bg-white border-0 buttons-countAccesories decrease-btn">-</button>

                                                                    <input type="text"
                                                                        class="mb-0 text-center bg-white border-0 qty-input releted-qty-input"
                                                                        name="qty" value="1" min="1"
                                                                        style="width: 40px" />

                                                                    <button type="button"
                                                                        class="bg-white border-0 buttons-countAccesories increase-btn"
                                                                        style="cursor: pointer;height: 24px;">+</button>
                                                                </div>

                                                            </div>
                                                            <div class="py-3 text-center">
                                                                <a href="">
                                                                    <small style="color: #ed2129;">Compare</small>
                                                                </a>
                                                                <a href="javascript:void(0)">|</a>
                                                                <a href="">
                                                                    <small style="color: #ed2129;">Wishlist</small>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <span>No Accessories Available</span>
                                    @endif
                                @empty
                                    <p>No Product Available</p>
                                @endforelse


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop-details end -->

    <!-- Shop-details tab start -->
    <section class="shop-details-desc">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="desc-wrapper">
                        <ul class="nav custom-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab11" data-toggle="tab" href="#profile11"
                                    role="tab" aria-controls="profile11" aria-selected="false">Overview
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab11" data-toggle="tab" href="#product-blogs"
                                    role="tab" aria-controls="product-blogs"
                                    aria-selected="false">Specification</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent1">
                            <div class="tab-pane fade show active" id="profile11" role="tabpanel"
                                aria-labelledby="profile-tab11">
                                <div class="desc-content mt-60">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-40 single-content">
                                                <p>{!! $product->overview !!}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-blogs" role="tabpanel"
                                aria-labelledby="contact-tab11">
                                <div class="desc-content mt-60">
                                    <div class="row small-padding">

                                        <p>{!! $product->specification !!}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop-details tab end -->

    <!-- Product  -->
    <div class="product pt-75 product-h-two">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-12">
                    <div class="section-header">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-sm-6">
                                <div class="product-section2">
                                    <h6 class="product--section__title2" id="releted-tab" data-toggle="tab"
                                        href="javascript:;" role="tab" aria-controls="releted"
                                        aria-selected="true">
                                        <span>Related Product</span>
                                    </h6>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="">

                <div class="tab-pane fade show active" id="nav-home-all" role="tabpanel"
                    aria-labelledby="nav-home-tab-all">
                    <div class="product__active owl-carousel">

                        @forelse ($relativeProduct as $relative_product)
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{ url('product' . '/' . $relative_product->id . '/' . $relative_product->product_slug) }}"
                                        class="image">

                                        <img title="{{ $relative_product->product_name }}"
                                            src=" {{ asset($relative_product->product_image) }}"
                                            data-tip="{{ $relative_product->product_name }}"
                                            style="width:100%; height: 300px;">
                                    </a>

                                    {{-- <span class="product-discount-label">New</span> --}}

                                    <ul class="product-links">

                                        <li><a type="submit" class="add_to_wishlist" style="cursor: pointer;"
                                                data-product_id="{{ $product->id }}" data-tip="Wishlist"><i
                                                    class="far fa-heart"></i></a></li>

                                        <li><a type="submit" style="cursor:pointer;" class="add_to_compare"
                                                data-product_id="{{ $relative_product->id }}" data-tip="Compare"><i
                                                    class="fas fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content d-flex justify-content-between align-items-center">
                                    <div>
                                        <span><a class="text-muted"
                                                href="{{ url('product' . '/' . $relative_product->id . '/' . $relative_product->product_slug) }}">{{ $relative_product->brand->brand_name }}</a>
                                        </span>
                                        <h3 title="{{ $relative_product->product_name }}"
                                            class="title font-weight-bold"><a
                                                href="{{ url('product' . '/' . $relative_product->id . '/' . $relative_product->product_slug) }}">{{ substr($relative_product->product_name, 0, 25) }}</a>
                                        </h3>
                                    </div>
                                    <div class="pr-2 price font-weight-bold">
                                        @if ($relative_product->price_status == 'rfq')
                                            <h6 class="mb-0 grenadier-color font-weight-bold">
                                                $ {{ $relative_product->sas_price }}
                                            </h6>
                                        @elseif ($relative_product->price_status == 'offer_price')
                                            <del>$ {{ $relative_product->price }}</del>
                                            <h6 class="mb-0 grenadier-color font-weight-bold">$
                                                {{ $relative_product->discount_price }}
                                            </h6>
                                        @elseif ($relative_product->price_status == 'price')
                                            <h6 class="mb-0 grenadier-color font-weight-bold">
                                                $ {{ $relative_product->price }}
                                            </h6>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <a type="submit" style="cursor:pointer;"
                                        class="add-cart add_to_cart_btn_product"
                                        data-product_id="{{ $relative_product->id }}">Add to cart</a>
                                </div>
                            </div>

                        @empty
                        @endforelse

                    </div>
                </div>



            </div>

        </div>
    </div>
    <!-- Product end -->


</main>
<!-- Main End -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Function to toggle cart buttons visibility
        function toggleCartButtons(cartQty) {
            if (cartQty > 0) {
                $('#cartButtons').show();
            } else {
                $('#cartButtons').hide();
            }
        }

        // Initial toggle based on $cartQty value
        var cartQty = {{ $cartQty ?? 0 }};
        toggleCartButtons(cartQty);

        // Example: Assume a product is added dynamically, for demonstration purposes
        // This could be triggered by an AJAX call or other events
        $('#addProductBtn').on('click', function() {
            // Code to add the product
            cartQty++; // Assuming the cart quantity is increased by 1
            toggleCartButtons(cartQty);
        });
    });
</script>

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const minusButton = document.querySelector('.minus');
        const plusButton = document.querySelector('.plus');
        const quantityInput = document.getElementById('dqty');
        const productPriceElement = document.getElementById('productPrice');

        const unitPrice = parseFloat(productPriceElement.innerText.replace('$ ', ''));

        minusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updatePrice();
            }
        });

        plusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue)) {
                quantityInput.value = currentValue + 1;
                updatePrice();
            }
        });

        function updatePrice() {
            let quantity = parseInt(quantityInput.value);
            if (!isNaN(quantity) && quantity > 0) {
                let newPrice = unitPrice * quantity;
                productPriceElement.innerText = '$ ' + newPrice.toFixed(2);
            }
        }
    });
</script> --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var productPriceElement = document.getElementById('productPrice');
        var originalPriceElement = document.getElementById('originalPrice');
        var priceStatus = '{{ $product->price_status }}';
        var basePrice = '{{ $product->price }}';
        var discountPrice = '{{ $product->discount_price }}';

        // Initial price display based on price status
        updatePrice();

        // Event listener for plus button
        document.querySelector('.plus').addEventListener('click', function() {
            var quantityInput = document.getElementById('dqty');
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updatePrice();
        });

        // Event listener for minus button
        document.querySelector('.minus').addEventListener('click', function() {
            var quantityInput = document.getElementById('dqty');
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updatePrice();
            }
        });

        // Function to update price based on quantity and price status
        function updatePrice() {
            var quantity = parseInt(document.getElementById('dqty').value);
            var totalPrice = 0;

            switch (priceStatus) {
                case 'rfq':
                    totalPrice = quantity * '{{ $product->sas_price }}';
                    break;
                case 'offer_price':
                    totalPrice = quantity * '{{ $product->discount_price }}';
                    break;
                case 'price':
                    totalPrice = quantity * '{{ $product->price }}';
                    break;
                default:
                    break;
            }

            productPriceElement.innerText = '$ ' + totalPrice.toFixed(2);
        }
    });
</script>

{{-- Related Child Product  --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all product containers
        const products = document.querySelectorAll('.releted-accessories-items');

        // Iterate over each product container
        products.forEach(function(product) {
            // Get elements within each product container
            const decreaseButton = product.querySelector('.decrease-btn');
            const increaseButton = product.querySelector('.increase-btn');
            const qtyInput = product.querySelector('.qty-input');

            // Add click event listeners for increase and decrease buttons
            decreaseButton.addEventListener('click', function() {
                // Decrease the value only if it's greater than the minimum value (1 in this case)
                if (parseInt(qtyInput.value) > 1) {
                    qtyInput.value = parseInt(qtyInput.value) - 1;
                }
            });

            increaseButton.addEventListener('click', function() {
                // Increase the value
                qtyInput.value = parseInt(qtyInput.value) + 1;
            });
        });
    });
</script>

@endsection
