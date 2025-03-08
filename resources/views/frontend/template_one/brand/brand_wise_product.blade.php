@extends('frontend.template_one.frontend_dashboard_template_one')

@section('index_template_one')
@section('title', 'Dada Bhaai | ' . $brandwiseproduct->brand_name)

<!-- Shop area start -->
<div class="product shop-page pt-30">
    <div class="container">
        <div class="row">

            @include('frontend.template_one.partials.frontend_sidebar')

            <div class="order-1 col-lg-9 order-lg-2">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="shop-banner-bg pt-120 pb-120 mb-50"
                            data-background="{{ asset('storage/brand/' . $brandwiseproduct->brand_image) }}">
                            <div class="collection-text"></div>
                        </div>
                    </div>
                </div>
                <div class="border-b">
                    <div class="mx-0 row align-items-center" style="background: #f5f5f5;">
                        <div class="col-lg-10 col-8">
                            <div class="shop-bar d-flex align-items-center">
                                <h4 class="mb-0 f-800 cod__black-color">Product</h4>
                                <div class="mb-0 form-group has-search w-100">
                                    <input type="text" class="form-control w-00" id="category_product_search"
                                        placeholder="Search">
                                    <span class="pr-4 fa fa-search form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <!-- Sorting Dropdown -->
                        <div class="col-lg-2 col-4">
                            <div class="d-flex justify-content-end">
                                <select name="" id="sortBy" class="border">
                                    <option selected disabled>Sort By</option>
                                    <option value="nameAtoZ" {{ $sort == 'nameAtoZ' ? 'selected' : '' }}>Product Name: A
                                        to Z</option>
                                    <option value="nameZtoA" {{ $sort == 'nameZtoA' ? 'selected' : '' }}>Product Name: Z
                                        to A</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product List -->
                <div id="products-list" class="row mt-30">
                    @foreach ($products as $product)
                        <div class="col-lg-4">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}"
                                        class="image">
                                        <img title="{{ $product->product_name }}"
                                            src=" {{ asset($product->product_image) }}"
                                            data-tip="{{ $product->product_name }}" style="width:100%; height: 300px;">
                                    </a>
                                </div>
                                <div class="product-content d-flex justify-content-between align-items-center">
                                    <div>
                                        <span><a class="text-muted"
                                                href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ $product->brand->brand_name }}</a></span>
                                        <h3 title="{{ $product->product_name }}" class="title font-weight-bold"><a
                                                href="{{ url('product' . '/' . $product->id . '/' . $product->product_slug) }}">{{ substr($product->product_name, 0, 25) }}</a>
                                        </h3>
                                    </div>
                                    <div class="pr-2 price font-weight-bold">
                                        @if ($product->price_status == 'rfq' && !is_null($product->sas_price))
                                            <h6 class="mb-0 grenadier-color font-weight-bold">$
                                                {{ $product->sas_price }}</h6>
                                        @elseif ($product->price_status == 'offer_price' && !is_null($product->price) && !is_null($product->discount_price))
                                            <del>$ {{ $product->price }}</del>
                                            <h6 class="mb-0 grenadier-color font-weight-bold">$
                                                {{ $product->discount_price }}</h6>
                                        @elseif ($product->price_status == 'price' && !is_null($product->price))
                                            <h6 class="mb-0 grenadier-color font-weight-bold">$ {{ $product->price }}
                                            </h6>
                                        @endif
                                    </div>
                                </div>

                                {{-- <a type="submit" style="cursor:pointer;" class="add-cart add_to_cart_btn_product"
                                    data-product_id="{{ $product->id }}">Add to cart</a> --}}

                                @if ($product->sas_price !== null || $product->price !== null || $product->discount_price !== null)
                                    <a type="submit" style="cursor:pointer;" class="add-cart add_to_cart_btn_product"
                                        data-product_id="{{ $product->id }}">Add to cart</a>
                                @else
                                    <a href="{{ route('template_one.contact') }}" class="add-cart">Contact Us</a>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10 row">
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
<!-- Shop area end -->

@endsection

@section('brandscripts')
<script>
    // Change sorting
    $('#sortBy').change(function(e) {
        e.preventDefault();
        let sortBy = $('#sortBy').val();
        window.location = "{{ url('' . $route . '') }}/{{ $brandId }}/{{ $brandSlug }}?sort=" +
            sortBy;
    });

    // Search products via AJAX
    $('#category_product_search').on('input', function() {
        let searchQuery = $(this).val();
        let brandId = '{{ $brandId }}';
        let sort = '{{ $sort }}';

        // Make AJAX request
        $.ajax({
            url: '{{ route('brand.related.product.search') }}', // Your search route
            type: 'GET',
            data: {
                query: searchQuery,
                brand_id: brandId,
                sort: sort
            },
            success: function(response) {
                $('#products-list').html(response);
            }
        });
    });
</script>
@endsection
