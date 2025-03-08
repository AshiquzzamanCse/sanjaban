@extends('frontend.template_one.frontend_dashboard_template_one')
@section('index_template_one')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- shop area start -->
    <div class="product shop-page pt-30 pb-80" style="margin-top: 60px;">
        <div class="container">
            <div class="row">

                {{-- Brand  --}}
                <div class="col-lg-3 order-2 order-lg-1">
                    @php
                        $brands = App\Models\Brand::where('status', '1')
                            ->orderBy('brand_name', 'ASC')
                            ->latest()
                            ->limit(7)
                            ->get();
                        $categorys = App\Models\Admin\Category::where('status', '1')
                            ->orderBy('category_name', 'ASC')
                            ->latest()
                            ->limit(9)
                            ->get();
                    @endphp
                    <div class="common-sidebar shop-banner-sidebar">
                        {{-- Category  --}}
                        <div class="common-cat">
                            <div class="side-title">
                                <h6>Category</h6>
                            </div>
                            {{-- Brands Accordion --}}
                            <div id="accordionBrands" class="accordion">
                                <div class="card border-0 shadow-none mb-0">
                                    @foreach ($categorys as $category)
                                        <div class="card-header collapsed pl-0" data-toggle="collapse"
                                            data-parent="#accordion" href="#cat{{ $category->id }}">
                                            <a class="card-title">
                                                {{ $category->category_name }}
                                            </a>
                                        </div>
                                        <div id="cat{{ $category->id }}" class="collapse" data-parent="#accordion"
                                            style="background-color: #f5f5f5;">

                                            @php
                                                $subcategorys = App\Models\Admin\SubCategory::where('status', '1')
                                                    ->where('category_id', $category->id)
                                                    ->latest()
                                                    ->get();
                                            @endphp

                                            <div id="accordion2" class="accordion pl-3">

                                                @forelse ($subcategorys as $subcategory)
                                                    <div class="card border-0 shadow-none mb-0">
                                                        <div class="card-header collapsed pl-0" data-toggle="collapse"
                                                            data-target="#sub{{ $subcategory->id }}">
                                                            <a class="card-title">
                                                                {{ $subcategory->subcategory_name }}
                                                            </a>
                                                        </div>
                                                        <div id="sub{{ $subcategory->id }}" class="collapse"
                                                            data-parent="#accordion2" style="background-color: #f5f5f5;">

                                                            @php
                                                                $childcategorys = App\Models\Admin\ChildCategory::where(
                                                                    'status',
                                                                    '1',
                                                                )
                                                                    ->where('subcategory_id', $subcategory->id)
                                                                    ->latest()
                                                                    ->get();
                                                            @endphp
                                                            @forelse ($childcategorys as $childcategory)
                                                                <div class="card-body p-2">
                                                                    <a href="{{ url('product/childcategory/' . $childcategory->id . '/' . $childcategory->childcategory_slug) }}"
                                                                        class="pl-3 text-muted">{{ $childcategory->childcategory_name }}</a>
                                                                </div>
                                                            @empty
                                                                <p>No ChildCategory Avaiable</p>
                                                            @endforelse

                                                        </div>
                                                    </div>
                                                @empty
                                                    <p>No SubCategory Avaiable</p>
                                                @endforelse


                                            </div>
                                        </div>
                                    @endforeach

                                    {{-- Multi Accordion End --}}
                                </div>
                            </div>

                        </div>
                        {{-- Category  --}}

                    </div>

                </div>

                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="shop-banner-bg pt-120 pb-120 mb-50"
                                data-background="{{ asset('frontend/template_one/assets/img/bg/shop-banner-bg.jpg') }}">

                            </div>
                        </div>
                    </div>

                    <div class="border-b">

                        <div class="row">

                            <div class="col-lg-5 col-md-4">
                                <div class="shop-bar d-flex align-items-center">
                                    <h4 class="f-800 cod__black-color">Product</h4>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                {{ $item }}</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-2">
                                <div class="text-center" style="margin-top: 10px;">
                                    {{-- <span>Showing {{ count($products) }} of {{ $products->total() }} Results</span> --}}
                                    {{-- <span>Search By Product Name </span> --}}

                                </div>
                            </div>

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
                                            @if (
                                                ($product->price_status == 'rfq' && !is_null($product->sas_price)) ||
                                                    ($product->price_status == 'offer_price' && !is_null($product->price) && !is_null($product->discount_price)) ||
                                                    ($product->price_status == 'price' && !is_null($product->price)))
                                                @if ($product->price_status == 'rfq')
                                                    <h6 class="grenadier-color mb-0 font-weight-bold">
                                                        $ {{ $product->sas_price }}
                                                    </h6>
                                                @elseif ($product->price_status == 'offer_price')
                                                    <del>$ {{ $product->price }}</del>
                                                    <h6 class="grenadier-color mb-0 font-weight-bold">$
                                                        {{ $product->discount_price }}</h6>
                                                @elseif ($product->price_status == 'price')
                                                    <h6 class="grenadier-color mb-0 font-weight-bold">
                                                        $ {{ $product->price }}
                                                    </h6>
                                                @endif
                                            @endif
                                        </div>

                                    </div>


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

                    {{-- Pagination Section  --}}

                    <div class="row mt-10">
                        <div class="col-sm-12">
                            <div class="common-pagination">

                                {{ $products->links('vendor.pagination.template_one') }}

                            </div>
                        </div>
                    </div>

                    {{-- Pagination Section  --}}

                </div>

            </div>
        </div>
    </div>
    <!-- shop area end -->
@endsection
